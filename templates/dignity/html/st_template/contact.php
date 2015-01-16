<!-- page-section : starts -->





            <div class="row">
                <article class="col-md-12 liner-division-light">
                </article>
            </div>

            <div class="row">
                <article class="col-md-12 text-center">

                    <div class="contact-success-message"></div>

                    <div class="alert alert-error error" id="fname">
                        Name must not be empty
                    </div>
                    <div class="alert alert-error  error" id="fmail">
                        Please provide a valid email
                    </div>
                    <div class="alert alert-error  error" id="fmsg">
                        Message should not be empty
                    </div>
                </article>
            </div>

            <form name="myform" id="contactForm" class="contact-<?php echo $id; ?>" action="index.php?option=com_stpagebuilder&task=page.contact&tmpl=component" enctype="multipart/form-data" method="post">

                <div class="row add-top-small animated" data-fx="pulse">
                    <article class="col-md-4">
                        <input type="text" placeholder="Name" id="name" name="name" size="100">
                        <input type="text" placeholder="email" name="email" id="email" size="30">
                    </article>
                    <article class="col-md-6">
                        <textarea placeholder="Message" name="message" cols="40" rows="3" id="msg"></textarea>
                    </article>
                    <article class="col-md-2">
                        <button class="btn btn-rounded" id="submit" name="submit" type="submit">Go</button>
                    </article>
                </div>
                <input type="hidden" class="subjectform" name="subject" value="<?php echo $subject; ?>" />
            </form>

