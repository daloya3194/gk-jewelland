// Register the plugin
FilePond.registerPlugin(FilePondPluginImagePreview);

// Get a reference to the file input element
const inputElement = document.querySelector('input[id="avatar"]');
const csrf_token = document.querySelector('input[name="_token"]').value;

// Create a FilePond instance
const pond = FilePond.create(inputElement);

FilePond.setOptions({
    server: {
        headers: {
            'X-CSRF-TOKEN': csrf_token
        },
        process: {
            url: '/upload',
            method: 'POST',
            onload: function (responce) {
                // console.log(responce)
                return responce // added
            },
        },
        revert: (uniqueFileId) => {
            // window.href = '/delete/' + uniqueFileId
            var xhr = new XMLHttpRequest();
            xhr.open("POST", '/delete', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
            xhr.send(JSON.stringify({
                path: uniqueFileId
            }));
        },
        // url: '/upload',
    }
});
