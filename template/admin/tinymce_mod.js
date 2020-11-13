
            tinymce.init({
              selector: 'textarea',
              height:530,
              width:770,
                
                /* plugin */
                plugins: [
                    "code advlist autolink link image lists charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],

                /* toolbar */
                toolbar: "insertfile undo redo | code styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
                
                /* style */
                style_formats: [
                    {title: "Headers", items: [
                        {title: "Header 1", format: "h1"},
                        {title: "Header 2", format: "h2"},
                        {title: "Header 3", format: "h3"},
                        {title: "Header 4", format: "h4"},
                        {title: "Header 5", format: "h5"},
                        {title: "Header 6", format: "h6"}
                    ]},
                    {title: "Inline", items: [
                        {title: "Bold", icon: "bold", format: "bold"},
                        {title: "Italic", icon: "italic", format: "italic"},
                        {title: "Underline", icon: "underline", format: "underline"},
                        {title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
                        {title: "Superscript", icon: "superscript", format: "superscript"},
                        {title: "Subscript", icon: "subscript", format: "subscript"},
                        {title: "Code", icon: "code", format: "code"}
                    ]},
                    {title: "Blocks", items: [
                        {title: "Paragraph", format: "p"},
                        {title: "Blockquote", format: "blockquote"},
                        {title: "Div", format: "div"},
                        {title: "Pre", format: "pre"}
                    ]},
                    {title: "Alignment", items: [
                        {title: "Left", icon: "alignleft", format: "alignleft"},
                        {title: "Center", icon: "aligncenter", format: "aligncenter"},
                        {title: "Right", icon: "alignright", format: "alignright"},
                        {title: "Justify", icon: "alignjustify", format: "alignjustify"}
                    ]}
                ],
              // enable title field in the Image dialog
              image_title: true, 
              // enable automatic uploads of images represented by blob or data URIs
              automatic_uploads: true,
              // add custom filepicker only to Image dialog
              file_picker_types: 'image',

                // without images_upload_url set, Upload tab won't show up
                images_upload_url: 'upload.php',
                
                // override default upload handler to simulate successful upload
                images_upload_handler: function (blobInfo, success, failure) {
                    var xhr, formData;
                  
                    xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open('POST', 'upload.php');
                  
                    xhr.onload = function() {
                        var json;
                    
                        if (xhr.status != 200) {
                            failure('HTTP Error: ' + xhr.status);
                            return;
                        }
                    
                        json = JSON.parse(xhr.responseText);
                    
                        if (!json || typeof json.location != 'string') {
                            failure('Invalid JSON: ' + xhr.responseText);
                            return;
                        }
                    
                        success(json.location);
                    };
                  
                    formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());
                  
                    xhr.send(formData);
                },
            });