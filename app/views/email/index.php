

<?php require APPROOT .'/views/inc/navbar.php'; ?>
<?php require APPROOT .'/views/inc/header.php'; ?>

    <div class="row">
        <div class="col-md-6">
            <a href=" <?php echo URLROOT; ?>/emailController/add" class="btn btn-primary pull-right">
                <span class="fa fa-pencil"></span>
                Schedule Email
            </a>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
              <?php flash('automated_message'); ?>
            </div>
        </div>
    </div>


    <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>Recipient Email</th>
            <th>Subject</th>
            <th>Scheduled Time</th>
            <th>Status</th>
            <th>Attempts</th>
            <th>Mins</th>

          </tr>
        </thead>
        <tbody>

          <?php  foreach ($data['scheduledEmail'] as $scheduledEmail){ ?>
            <tr>
              <td><?php echo $scheduledEmail->recipient_email; ?></td>
              <td><?php echo $scheduledEmail->subject; ?></td>
              <td><?php echo $scheduledEmail->scheduled_time; ?></td>
              <td><?php echo $scheduledEmail->status; ?></td>
              <td><?php echo $scheduledEmail->attempts; ?></td>
              <td><?php echo $scheduledEmail->mins; ?></td>


            </tr>
          <?php  } ?>
        </tbody>
      </table>
    </div>


<?php require APPROOT .'/views/inc/footer.php'; ?>







