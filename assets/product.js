import $ from 'jquery';

$(document).ready(
    function ()
    {
        $('form#product').on(
            'submit',
            function (e)
            {
                // Prevent the default action from happening
                e.preventDefault();

                // Disable the submit button and add a loading class
                $('button#product_submit').attr('disabled', true)
                    .addClass('loading');

                // Get the info to send to the API
                let form = {
                    name: $('input#product_name').val(),
                    id: $('input#product_id').val(),
                    date: $('input#product_date').val(),
                    manager: $('input#product_manager').val()
                };

                // Send the info
                $.post(
                    $(this).attr('action'),
                    form,
                    function (d)
                    {
                        // Display the return message
                        $('div#message').html(d.data.message);
                    }
                )
                    .always(
                        function ()
                        {
                            // Enable the submit button and remove the loading class
                            $('button#product_submit').attr('disabled', false)
                                .removeClass('loading');
                        }
                    );

            }
        );
    }
);