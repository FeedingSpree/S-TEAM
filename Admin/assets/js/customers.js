document.getElementById("searchButton").addEventListener("click", function() {
    const searchInput = document.getElementById("searchInput").value;
    
    // Create the URL with the search query
    const url = "search.php?search=" + encodeURIComponent(searchInput);
    
    // Create an XMLHttpRequest to fetch the data
    const xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Update the table with the new search results
            document.getElementById("results").innerHTML = xhr.responseText;
        } else {
            console.error("Error fetching data");
        }
    };
    
    xhr.send();
});
