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

      <div class='row qzr-header qzr-edit-header'>
        <div class='col-sm'>
          <input class='qzr-input' placeholder="Name...">
          <div class="description-wrapper">
            <textarea id='description' class='qzr-input' maxlength="200" placeholder="Description..." style='width:100%; height:120px;'></textarea>
            <span id='wordcount'>0 / 200</span>
          </div>
        </div>
        <div class='col-sm buttons'>
          <button type="button" class="qzr-button good" data-toggle="modal" data-target="#createModal">
            <i class="fas fa-save"></i> Save & Quit
          </button>

          <button type="button" class="qzr-button bad" data-toggle="modal" data-target="#createModal">
            <i class="fas fa-trash"></i> Delete Quiz
          </button>
        </div>
      </div>

      <section id='questions'>

        <div id='question-1' class="qzr-edit-question">

          <div class='handle'>
            <i class="fas fa-grip-vertical"></i>
          </div>

          <textarea class='qzr-input' maxlength="200" placeholder="Question..." style='width:100%; height:100px;'></textarea>

          <ol type='A' id='test'>
            <li>
              <div class="answer-wrapper">
                <input type='text' class='qzr-input' placeholder="Answer...">
                <label class="radio-container">
                  <input type='radio' name='question-1-answer' class='qzr-input-radio'>
                  <span class="checkmark" />
                </label>
              </div>
            </li>

            <li>
              <div class="answer-wrapper">
                <input type='text' class='qzr-input' placeholder="Answer...">
                <label class="radio-container">
                  <input type='radio' name='question-1-answer' class='qzr-input-radio'>
                  <span class="checkmark" />
                </label>
              </div>
            </li>

            <li>
              <div class="answer-wrapper">
                <input type='text' class='qzr-input' placeholder="Answer...">
                <label class="radio-container">
                  <input type='radio' name='question-1-answer' class='qzr-input-radio'>
                  <span class="checkmark" />
                </label>
              </div>
            </li>

          </ol>

          <button class='add-answer qzr-button'><i class="fas fa-plus"></i> Add another answer</a>

          <div class="manager">
            <a href='#' data-toggle="tooltip" data-placement="top" title="Copy this question"><i class="fas fa-copy"></i></a>
            <a href='#' data-toggle="tooltip" data-placement="top" title="Delete this question"><i class="fas fa-trash"></i></a>
          </div>

        </div>

        <div id='question-2' class="qzr-edit-question">

          <div class='handle'>
            <i class="fas fa-grip-vertical"></i>
          </div>

          2

        </div>

        <div id='question-3' class="qzr-edit-question">

          <div class='handle'>
            <i class="fas fa-grip-vertical"></i>
          </div>

          3

        </div>

      </section>

    </div>

    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="/static/js/scripts.js"></script>

    <script>
    jQuery(function($){

      $('#description').on('keyup', function(element){
        $('#wordcount').html(element.target.value.length + " / 200");
      });

      $("#questions").sortable({
          placeholder: 'slide-placeholder',
          handle: '.handle',
          revert: 150,
          start: function(e, ui){
            placeholderHeight = ui.item.outerHeight();
            ui.placeholder.height(placeholderHeight + 15);
            $('<div class="slide-placeholder-animator" data-height="' + placeholderHeight + '"></div>').insertAfter(ui.placeholder);
          },
          change: function(event, ui) {

            ui.placeholder.stop().height(0).animate({
              height: ui.item.outerHeight() + 15
            }, 300);

            placeholderAnimatorHeight = parseInt($(".slide-placeholder-animator").attr("data-height"));

            $(".slide-placeholder-animator").stop().height(placeholderAnimatorHeight + 15).animate({
              height: 0
            }, 300, function() {
              $(this).remove();
              placeholderHeight = ui.item.outerHeight();
              $('<div class="slide-placeholder-animator" data-height="' + placeholderHeight + '"></div>').insertAfter(ui.placeholder);
            });

          },
          stop: function(e, ui) {
            $(".slide-placeholder-animator").remove();
          },
      });

    });

    </script>
  </body>
</html>
