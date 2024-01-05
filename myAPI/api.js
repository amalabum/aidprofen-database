const headers = new Headers();
headers.append('Authorization', 'Bearer SOME-VALUE');

fetch('https://border.free.beeceptor.com/todos', {
    method: 'GET',
    headers: headers,
  })
  .then(response => response.text())
  .then(data => {
    console.log(data);
  })
  .catch(error => {
    console.error(error);
  });
JavaScript - jQuery
$.ajax({
  url: 'https://border.free.beeceptor.com/todos',
  type: 'GET',
  headers: {
    'Authorization': 'Bearer SOME-VALUE'
  },
  success: function(data) {
    console.log(data);
  },
  error: function(xhr, textStatus, errorThrown) {
    console.error('Request failed with status code: ' + xhr.status);
  }
});