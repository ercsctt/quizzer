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
          <h3>Quizzes</h3>
          <p>View and manage quizzes</p>
        </div>
        <div class='col-sm buttons'>
          <div class="search-wrapper">
            <input class="qzr-search" placeholder="Search...">
            <i class="icon fas fa-search"></i>
          </div>

          <button type="button" class="qzr-button good" data-toggle="modal" data-target="#createModal">
            <i class="fas fa-plus"></i> Create a Quiz
          </button>
        </div>
      </div>

      <?php
      for($i = 0; $i < 10; $i++){
      ?>
      <div class="qzr-table container">

        <div class="row">

          <div class='col-sm-3 info'>
            <h4><a href='/quiz/id'>Name</a></h4>
            <p>This is a description... blah blahblahblahblahblahblahblah</p>
          </div>
          <div class='col-sm-2 meta'>
            <p><span>10</span> Questions</p>
          </div>
          <div class='col-sm-2 meta'>
            <p>Created <span>24/04/2019</span></p>
          </div>
          <div class='col-sm-5 buttons'>
            <a href='/quiz/id'>
              <button type="button" class="qzr-button ok">
                <i class="fas fa-eye"></i> View
              </button>
            </a>

            <button class="btn dropdown-toggle qzr-button good" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/quiz/id/edit"><i class="fas fa-edit"></i> Edit</a>
              <div role="separator" class="dropdown-divider"></div>
              <a class="dropdown-item red" href="/quiz/id/delete"><i class="fas fa-trash"></i> Delete</a>
            </div>
          </div>

        </div>

      </div>
      <?php
      }
      ?>

    </div>

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body qzr-create">

            <h1>Create a Quiz</h1>
            <p>Please fill in the fields below...</p>

            <input class='qzr-input' placeholder="Name">
            <textarea class='qzr-input' maxlength="500" placeholder="Description" style='width:100%; height:150px;'></textarea>

            <div class="buttons">
              <button type="button" class="qzr-button good">
                Create <i class="fas fa-arrow-right"></i>
              </button>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="/static/js/scripts.js"></script>
  </body>
</html>
