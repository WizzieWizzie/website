<?php

/**
 * lib/email.php
 *
 * @package    madebydavid/wizzie-theme
 * @author     David Sutherland <sutherland.dave@gmail.com>
 * @link       https://bitbucket.org/madebydavid/wizziewizziewptheme
 */

require_once WP_CONTENT_DIR . '/../vendor/autoload.php';

/**
 * Sends a wizzie email
 * 
 * @param  string $subject      The subject of the email
 * @param  string $to           The recipient
 * @param  string $templateName The filename of the email template (in the emails dir)
 * @param  array  $vars         The variables to place in the template
 * 
 * @return boolean              The success of sending
 */
function wizzie_email_send($subject, $to, $templateName, array $vars) {

	$twig = wizzie_twig(dirname(__FILE__) . '/../emails');
	$mailer = wizzie_mailer();

	$message = \Swift_Message::newInstance()
		->setSubject($subject)
		->setFrom(array(WIZZIE_EMAIL_SENDER_EMAIL => WIZZIE_EMAIL_SENDER_NAME))
		->setCC(explode(',', WIZZIE_EMAIL_CCS))
		->setTo(array($to))
		->setBody(
			$twig->render($templateName, $vars),
			'text/html'
		);

	return $mailer->send($message);
}

/**
 * Returns a twig instance
 * 
 * @param  string $templateDir The location of the twig templates
 * 
 * @return \Twig_Environment
 */
function wizzie_twig($templateDir) {

	static $twig = null;

	if (is_null($twig)) {
		$twig = new Twig_Environment(
			new Twig_Loader_Filesystem($templateDir), 
			array('debug' => true)
		);
		$twig->addExtension(new Twig_Extension_Debug());
	}

	return $twig;
}

/**
 * Returns a swift mailer instance
 * 
 * @return \Swift_Mailer
 */
function wizzie_mailer() {

	static $mailer = null;
	static $transport = null;

	if (is_null($mailer)) {
		$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
			->setUsername(WIZZIE_MAILER_USERNAME)
			->setPassword(WIZZIE_MAILER_PASSWORD);

		$mailer = Swift_Mailer::newInstance($transport);
	}

	return $mailer;

}