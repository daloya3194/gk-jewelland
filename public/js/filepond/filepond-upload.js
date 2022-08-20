// Register the plugin
FilePond.registerPlugin(FilePondPluginImagePreview);
FilePond.registerPlugin(FilePondPluginFileValidateType);

// Get a reference to the file input element
const inputElement = document.querySelector('input[id="avatar"]');
const csrf_token = document.querySelector('input[name="_token"]').value;
const max_number_of_images = document.getElementById('max_number_of_images').value;
const image_require = document.getElementById('image_require').value;

// Create a FilePond instance
const pond = FilePond.create(inputElement, {
    acceptedFileTypes: ['image/png', 'image/jpeg'],
});

// console.log(image_require === '1', csrf_token);

FilePond.setOptions({
    maxFiles: max_number_of_images,
    required: image_require === '1',
    server: {
        headers: {
            'X-CSRF-TOKEN': csrf_token
        },
        process: {
            url: '/en/upload',
            method: 'POST',
            onload: function (responce) {
                // console.log(responce)
                return responce // added
            },
        },
        revert: (uniqueFileId) => {
            // window.href = '/delete/' + uniqueFileId
            var xhr = new XMLHttpRequest();
            xhr.open("POST", '/en/delete', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-CSRF-TOKEN', csrf_token);
            xhr.send(JSON.stringify({
                path: uniqueFileId
            }));
        },
        // url: '/upload',
    }
});
