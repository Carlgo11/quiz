function activate($question, $answer) {
  $a = $question + "" + $answer + "";
  $b = "#" + $question;

  if (!$('#' + $a).hasClass('disabled')) {
    if ($('#' + $a).hasClass('active')) {
      $('#' + $a).removeClass('active');
      $($b + 'answer').val('');
    } else {
      $('#' + $a).addClass('active');
      $($b + 'answer').val($answer);
      if ($answer === "1") {
        $($b + 'X').removeClass('active');
        $($b + '2').removeClass('active');
      } else if ($answer === "X") {
        $($b + '1').removeClass('active');
        $($b + '2').removeClass('active');
      } else if ($answer === "2") {
        $($b + '1').removeClass('active');
        $($b + 'X').removeClass('active');
      }
    }
  }
  $(this).blur();
}

$(document).ready(function() {

  $('#submit').click(function() {
    if ($('#group-name').val() !== '') {
      console.log("submit-btn");
      $(this).fadeOut();
      $('#name').fadeOut('500');
      $('.answer-btn').toggleClass('disable-select');
      $('.answer-btn:not(.active)').fadeOut(2000);
    }
  });

  $("#form").on("submit", function(e) {

    $('#alert').toggleClass('hidden');
    $('#alert').delay(950).fadeOut('slow');
    e.preventDefault();
  });

  $(".answer-btn").click(function(e) {
    var url = "submit.php";
    $.ajax({
      type: "POST",
      url: url,
      data: $("#form").serialize(),
      success: function(data) {}
    });
  });

});
