'use strict';
$(document).ready(function() {
  setListeners();

  function setListeners() {
    setLikeButtons();
    setDislikeButtons();
  }

  function setLikeButtons() {
    let buttons = $('.likes');
    for (var i = 0; i < buttons.length; i++) {
      let btn = $(buttons[i]);
      btn.click(function() {
        get('article/' + btn.data('article-id') + '/upvote', _rateResponse);
      })
    }
  }

  function setDislikeButtons() {
    let buttons = $('.dislikes');
    for (var i = 0; i < buttons.length; i++) {
      let btn = $(buttons[i]);
      btn.click(function() {
        get('article/' + btn.data('article-id') + '/downvote', _rateResponse);
      })
    }
  }

  function _rateResponse(err, res) {
    if (res === 'success') {
      location.reload();
    }
  }
});
