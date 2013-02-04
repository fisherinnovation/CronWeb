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
          <p class="lead">Enough dealing with tricky Cronjob syntax. Manage your users crontab via the web easily.</p>
        </div>

        <hr>

        <div class="row-fluid marketing">
          <div class="span6">
            <h4>How it Works</h4>
            <p>It's pretty simple. Rather then dealing with criptic crontab time syntax and script reference by hand, this simple and straight forward web interface allows you to easily add and remove cronjobs on your system in seconds.</p>
          </div>

          <div class="span6">
            <h4>Project Source</h4>
            <p>Feel free to contribute to this project at any time by visiting the project GitHub page. You can also find the issue track as well in case you have encounted any undocumented issues.</p>
            
            <iframe src="http://ghbtns.com/github-btn.html?user=fisherinnovation&repo=CronWeb&type=fork&count=true&size=large"
  allowtransparency="true" frameborder="0" scrolling="0" width="130" height="30"></iframe>

            <iframe src="http://ghbtns.com/github-btn.html?user=fisherinnovation&repo=CronWeb&type=watch&count=true&size=large"
  allowtransparency="true" frameborder="0" scrolling="0" width="170" height="30"></iframe>
            <br>
  <iframe src="http://ghbtns.com/github-btn.html?user=fisherinnovation&repo=CronWeb&type=follow&count=true&size=large"
  allowtransparency="true" frameborder="0" scrolling="0" width="250" height="30"></iframe>

          </div>
        </div>
      </div>

      <div id="new">
        <div class="row-fluid">
          <form>
          <div class="span6">
              <fieldset>
                <legend>Legend</legend>
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
            <p>Enter either a valid CLI command to run on the system with the current users permissions, or reference a external script for execution.</p>
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
        <p><a class="btn btn-danger delete-all-btn">Delete All Jobs</a></p>
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
