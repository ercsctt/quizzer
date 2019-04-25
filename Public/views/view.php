<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Quizzer</title>
    <meta name="description" content="Quizzer is a Quiz CMS made for BCS">
    <meta name="author" content="Eric Scott">

    <link href="https://images.plugin.support/pluginsupport/favicon.png" rel=icon>

    <!-- CSS IMPORTS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="/static/css/styles.css">

  </head>

  <body>

    <!-- NAVIGATION -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light qzr-navbar-std">
      <div class="container">
        <a class="navbar-brand" href="/">Quizzer</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Quizzes <span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <span class="navbar-text">
            Hi [firstname], <a href='/user/logout/'>Logout?</a>
          </span>
        </div>
      </div>
    </nav>

    <!-- CONTENT -->
    <div class="qzr-content container">

      <div class='row qzr-header'>
        <div class='col-sm'>
          <h3>Quiz Name</h3>
          <p>Quiz description... blah blah blah blah</p>
        </div>
        <div class='col-sm buttons'>
          <button type="button" class="qzr-button good" data-toggle="modal" data-target="#createModal">
            <i class="fas fa-arrow-left"></i> Go Back
          </button>
        </div>
      </div>

      <div class="qzr-question">

        <div class="header">
          <h4>Question 1:</h4>
          <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua?</h3>
        </div>

        <ol type='A'>
          <li>This is an answer</li>
          <li>This is an answer</li>
          <li>This is an answer</li>
          <li>This is an answer</li>
          <li>This is an answer</li>
        </ol>

      </div>

    </div>

    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="/static/js/scripts.js"></script>
  </body>
</html>
