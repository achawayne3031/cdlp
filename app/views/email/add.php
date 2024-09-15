
<?php require APPROOT .'/views/inc/navbar.php'; ?>
<?php require APPROOT .'/views/inc/header.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-light mt-5">
                    <h2>Add Email Notification</h2>
                    <p>Please fill out the form to register with us</p>
                   

                    <form action="<?php echo URLROOT; ?>/email/add" method="POST">

                        <div class="form-group">
                            <label for="recipient_email">Recipient Email,: <sup>*</sup></label>
                            <input type="text" name="recipient_email" class="form-control form-control-lg <?php echo (!empty($data['recipient_email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['recipient_email']; ?>">
                            <span class="invalid-feedback"><?php echo $data['recipient_email_err']; ?></span>
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject: <sup>*</sup></label>
                            <input type="text" name="subject" class="form-control form-control-lg <?php echo (!empty($data['subject_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['subject']; ?>">
                            <span class="invalid-feedback"><?php echo $data['subject_err']; ?></span>
                        </div>


                        <div class="form-group">
                            <label for="body">Body: <sup>*</sup></label>
                            <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['body']; ?>">
                            <?php echo $data['body']; ?>
                            </textarea>
                            <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
                        </div>

                        <div class="form-group">
                            <label for="schedule_time">Scheduled Time: <sup>*</sup></label>
                            <input type="datetime-local" name="scheduled_time" class="form-control form-control-lg <?php echo (!empty($data['scheduled_time_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['scheduled_time']; ?>">
                            <span class="invalid-feedback"><?php echo $data['scheduled_time_err']; ?></span>
                        </div>


                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Add Email Notification" class="btn btn-success btn-block">
                            </div>
                        </div>
                    </form>
                
                </div>
            
            </div>
        </div>
    </div>
       

<?php require APPROOT .'/views/inc/footer.php'; ?>






