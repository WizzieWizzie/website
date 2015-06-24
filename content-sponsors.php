<section class="module-sponsors">

    <div class="g-row">

        <h3>big thank you to our sponsors :)</h3>

        <a href="#" data-next></a>

        <div class="wrap">
            <ul>
                <li>
                    <a href="http://www.intel.co.uk/" target="_blank">
                        <img src="<?php echo get_template_directory_uri() ?>/images/sponsors/intel.png" alt="Intel" />
                    </a>
                </li>
                <li>
                    <a href="www.lenovo.com/" target="_blank">
                        <img src="<?php echo get_template_directory_uri() ?>/images/sponsors/lenovo.png" alt="Lenovo" />
                    </a>
                </li>
                <li>
                    <a href="http://ee.co.uk/" target="_blank">
                        <img src="<?php echo get_template_directory_uri() ?>/images/sponsors/ee.png" alt="ee" />
                    </a>
                </li>
                <li>
                    <a href="http://www.islington.gov.uk" target="_blank">
                        <img src="<?php echo get_template_directory_uri() ?>/images/sponsors/islington.png" alt="Islington Councik" />
                    </a>
                </li>
            </ul>
        </div>

    </div>

</section>

<script type="text/javascript">
$(function() {

    var $sponsors = $('.module-sponsors');
    var $sponsorsList = $('.module-sponsors ul');

    var $last;
    var $current = $sponsorsList.find('li:first-of-type');

    $('.module-sponsors').on('click', 'a[data-next]', function(){

        $sponsorsList.velocity({
            left: "-=" + $current.outerWidth(),
        }, {
            duration: 450,
            easing: [0.7, 0.135, 0.15, 0.86],
            complete: function(){

                $last = $current;
                $current = $current.next('li');

                $last.css('opacity', 0)
                     .appendTo($sponsorsList)
                     .velocity({ opacity: 1 }, 100)

                $sponsorsList.css('left', 0);

            }

        });


        return false;
    })
});
</script>
