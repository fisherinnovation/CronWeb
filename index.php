
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CronWeb by Fisher Innovation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A responsive HTML5/PHP crontab manager.">
    <meta name="author" content="Fisher Innovation">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li class="nav-home active"><a href="#" onclick="changePage('home');">Home</a></li>
          <li class="nav-new"><a href="#new" onclick="changePage('new');">New Cronjob</a></li>
          <li class="nav-active"><a href="#active" onclick="changePage('active');">Active Cronjobs</a></li>
        </ul>
        <h1><a onclick="changePage('home');">Cronweb <span class="muted">by Fisher Innovation</span></a></h1>
      </div>

      <hr>

      <div id="home">
        <div class="jumbotron">
          <h1>Manage Your Cronjobs Anywhere!</h1>
          <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        </div>

        <hr>

        <div class="row-fluid marketing">
          <div class="span6">
            <h4>Subheading</h4>
            <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
          </div>

          <div class="span6">
            <h4>Subheading</h4>
            <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
          </div>
        </div>
      </div>

      <div id="new">
        <div class="row-fluid">
          <form>
          <div class="span6">
              <fieldset>
                <legend>Legend</legend>
                <!--
                <label>Job Name</label>
                <input class="add-name" type="text" placeholder="Type something…">
                -->

                <label>Minute</label>
                <input class="add-minute" type="text" placeholder="0-59 or *">
                
                <label>Hour</label>
                <input class="add-hour" type="text" placeholder="0-23 or *">
                
                <label>Day of Week</label>
                <input class="add-dayweek" type="text" placeholder="0-6 or *">

                <label>Day of Month</label>
                <input class="add-daymonth" type="text" placeholder="0-31 or *">

                <label>Month</label>
                <input class="add-month" type="text" placeholder="0-12 or *">
              </fieldset>
          </div>

          <div class="span6">
            <h4>Command to Execute</h4>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <textarea class="add-command" style="width:100%;" rows="5"></textarea>
            <p>
              <a id="save-btn" class="btn btn-large btn-success">Save New Cronjob</a>
            </p>
          </div>
          </form>
        </div>
      </div>

      <div id="active">
        <h3>Active Cronjobs</h3>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Minute</th>
              <th>Hour</th>
              <th>Day of Week</th>
              <th>Day of Month</th>
              <th>Month</th>
              <th>Command</th>
              <th></th>
            </tr>
          </thead>
          <tbody class="active-job-list">
          </tbody>
        </table>
      </div>

        <hr>

        <div class="footer">
          <p>&copy; <?php echo date('Y'); ?> <a href="http://www.fisherinnovation.com" target="_blank">Fisher Innovation</a></p>
        </div>
      </div>
    </div>

    <script src="js/jquery-1.9.0.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
