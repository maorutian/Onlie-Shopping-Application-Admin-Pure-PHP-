

var xhr = new XMLHttpRequest();
xhr.open('GET', 'ajax_search.php?q=' + q, true);
xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
xhr.onreadystatechange = function () {
    if(xhr.readyState == 4 && xhr.status == 200) {
        var result = xhr.responseText;
        console.log('Result: ' + result);

        var json = JSON.parse(result);
        showSuggestions(json);
    }
};
xhr.send();