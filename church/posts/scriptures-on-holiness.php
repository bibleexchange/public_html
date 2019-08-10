<iframe src="https://docs.google.com/document/d/e/2PACX-1vQPq_3rI_klRKrRrF4LJd30zkgYwraf1Nx2ZHNBESv29oKuC7R_mJYj0szaNHMuXD322D_e8aUg_Da-/pub?embedded=true"></iframe>

 <script>
        // get all iframes that were parsed before this tag
        var iframes = document.getElementsByTagName("iframe");

        for (let i = 0; i < iframes.length; i++) {
            var url = iframes[i].getAttribute("src");
            if (url.startsWith("https://docs.google.com/document/d/")) {
                // create div and replace iframe
                let d = document.createElement('div');
                d.classList.add("embedded-doc"); // optional
                iframes[i].parentElement.replaceChild(d, iframes[i]);

                // CORS request
                var xhr = new XMLHttpRequest();
                xhr.open('GET', url, true);
                xhr.onload = function() {
                    // display response
                    d.innerHTML = xhr.responseText;
                };
                xhr.send();
            }
        }
    </script>