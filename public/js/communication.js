const base_url = BASE_URL + '/api/';

function post(url, data, callback) {
  $.post(base_url + url, data, callback);
}

function get(url, callback) {
  $.get(base_url + url, callback);
}
