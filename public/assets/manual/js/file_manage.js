
// !!! I LOVE JAVASCRIPT AND AJAX !!!

$(document).ready(function() {

    var cutCand = null // varriable for store file path will be moved
    var currentPath = rootPath // set current path to be root at first

    // set ajax request header with csrf token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // handler for add new folder button
    $(document).on('click', 'button#btn_new_folder', function() {
        $.ajax({
            url: '/file/create-folder',
            type: 'POST',
            data: {
                parent: currentPath
            },
            success: function(data) {
                return renderContent(data)
            },
            error: function(error) {
                alert('Error occured !')
            }
        })
    })

    // handler for open folder
    $(document).on('click', 'button.btn-open', function() {
        // set current path
        currentPath =  $(this).parent().parent().attr('data-path')

        $.ajax({
            type:'GET',
            url: `/file/open-folder?path=${currentPath}`,
            success: function(data) {
                return renderContent(data) 
            },
            error: function(error) {
                alert('error occured')
            }
        })
    })

    // handler for move up
    $(document).on('click', 'button#btn_move_up', function() {
        // check if now is root
        if(currentPath == rootPath)
            return alert('Now root folder')

        // set current path
        currentPath = currentPath.slice(0, currentPath.lastIndexOf('/'))

        // move up
        $.ajax({
            type:'GET',
            url: `/file/open-folder?path=${currentPath}`,
            success: function(data) {
                return renderContent(data)
            },
            error: function(error) {
                alert('Error occured !')
            }
        })
    })

    // handler for add new file
    $(document).on('click', 'button#btn_new_file', function() {
        // open file dialog when click add new file button
        var inptNewFile = document.getElementById('inpt_new_file')
        inptNewFile.click()
    })

    // handler for when file selected for upload
    $(document).on('change', 'input#inpt_new_file', function() {
        // check if file selected
        var fileName = $(this).val()
        if(!!fileName) {
            // check file mime type
            var mimeType = fileName.substr(fileName.lastIndexOf('.') + 1)
            var validMime = ['jpg', 'jpeg', 'png', 'bmp', 'gif']
            if(validMime.indexOf(mimeType.toLowerCase()) < 0) {
                $(btnUploadFile).prop('disabled', true)
                $(btnUploadFile).html('<i class="fa fa-file-upload mr-1"></i>')
                return alert('Please choose image file')
            }

            // set file name amd disable choose
            $(this).parent().find('span').html(fileName.substr(fileName.lastIndexOf('\\') + 1))
            $(this).parent().prop('disabled', true)
            $(this).parent().next().prop('disabled', false)
        }
    })

    // handler for upload file to server
    $(document).on('click', 'button#btn_upload_file', function() {
        var btnUploadFile = $(this)
        
        // get file data
        var fd = new FormData()
        var file = document.querySelector('input#inpt_new_file').files[0]
        fd.append('file', file)
        fd.append('path', currentPath)  

        // disable this button
        $(btnUploadFile).prop('disabled', true)
        $(btnUploadFile).html('<i class="fa fa-spinner fa-pulse"></i>')

        $.ajax({
            url: '/file/upload',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            success: function(data){
                if(!!data.result) 
                    renderContent(data.data)
                else
                    alert(data.message)

                // clear file button, input
                $(btnUploadFile).prop('disabled', true)
                $(btnUploadFile).html('<i class="fa fa-file-upload mr-1"></i>')
                $('button#btn_new_file').find('span').html('<i class="fa fa-plus mr-1"></i> New File')
                $('button#btn_new_file').prop('disabled', false)
                $('input#inpt_new_file').val('')
            },
            error: function(error) {
                alert('Error Occured !')
            }
        });
    })

    // handler for delete file
    $(document).on('click', 'button.btn-delete-file', function() {    
        var topContainer = $(this).parents("div.top-container")
        console.log(currentPath)
        $.ajax({
            type: 'DELETE',
            url: '/file/delete',
            data: {
                type: 'file',
                path: $(this).parent().parent().attr('data-path'),
                currentPath: currentPath
            },
            success: function(data) {
                if(!!data.result) {
                    $('div.tooltip').remove()
                    renderContent(data.data)
                }
                else    
                    alert(data.message)
            },
            error: function(error) {
                alert('Error occured !')
            }
        })
    })

    // handler for delete folder
    $(document).on('click', 'button.btn-delete-folder', function() {
        var topContainer = $(this).parents("div.top-container")

        $.ajax({
            type: 'DELETE',
            url: '/file/delete',
            data: {
                type: 'folder',
                path: $(this).parent().parent().attr('data-path'),
                currentPath: currentPath
            },
            success: function(data) {
                if(!!data.result) {
                    $('div.tooltip').remove()
                    renderContent(data.data)
                }
                else    
                    alert(data.message)
            },
            error: function(error) {
                alert('Error occured !')
            }
        })
    })

    // hanlder for rename file, folder
    $(document).on('blur', 'input.inpt-rename', function() {
        $(this).val($(this).parents('div.top-container').find('p.font-w600').text().trim())
    })
    $(document).on('keyup', 'input.inpt-rename', function(e) {
        if(e.keyCode == '13') {
            if(!$(this).val()) 
                return ;

            // check if file extension has changed
            if($(this).val().substr($(this).val().lastIndexOf('.') + 1) !== 
                $(this).parents('div.top-container').find('p.font-w600').text().trim().substr($(this).parents('div.top-container').find('p.font-w600').text().trim().lastIndexOf('.') + 1)) {
                if(!$(this).attr('data-type'))
                    return alert('Sorry can not changed the file extension')
            }

            var renameInput = $(this)
                
            $.ajax({ 
                type: 'PATCH',
                url: '/file/rename',
                data: {
                    original: $(renameInput).parent().parent().parent().attr('data-path'),
                    modify: $(renameInput).val() 
                },
                success: function(data) {
                    if(!!data.result) {
                        $(renameInput).parents('div.top-container').find('p.font-w600').text($(renameInput).val())
                    }
                    else
                        alert(data.message)
                },
                error: function(error) {
                    alert('Error Occured !')
                }
            })
        }
    })

    // handler for cut file
    $(document).on('click', 'button.btn-cut', function() {
        // set cut candidate
        cutCand = $(this).parents('div.options-overlay-content').attr('data-path')
        
        // get all content containers and make them fully visible
        var contentContainer = $('div.content-container')
        for (let i = 0; i < contentContainer.length; i++) 
            $(contentContainer[i]).css({'opacity': '1'})

        $(this).parents('div.top-container').find('div.content-container').css({'opacity': '0.5'})
    })

    // handler for paste file
    $(document).on('click', 'button.btn-paste', function() {
        // check if we have something to paset
        if(!cutCand)
           return alert('Nothing to pasete.')
        
        $.ajax({
            type: 'PATCH',
            url: '/file/move',
            data: {
                source: cutCand,
                dest: $(this).parents('div.options-overlay-content').attr('data-path'),
                currentPath: currentPath
            },
            success: function(data) {
                if(!!data.result) {
                    // if current folder is source then remove source content
                    if(!!$(`div[data-path='${cutCand}']`))
                        $(`div[data-path='${cutCand}']`).parents('div.top-container').remove()
                    
                    cutCand = null

                    alert('Moved Successfully !')
                    return renderContent(data.data)
                } else {
                    return alert(data.message)
                }
            },
            error: function(error) {
                return alert('Error Occured !')
            }
        })
    })
})


// function to render contents from json data
var renderContent = function(data) {
    var folderHTML = '',
    fileHTML = ''

    // first of all, generate headers
    $('h2#folder-heading').html(`
        <i class="far fa-fw fa-folder mr-1"></i> Folders (${data.folders.length})
    `)
    $('h2#file-heading').html(`
        <i class="far fa-fw fa-file mr-1"></i> Files (${data.files.length})
    `)

    // make html string to render on folders part
    for (let i = 0; i < data.folders.length; i++) {
        
        folderHTML += `
            <div class="col-sm-6 col-md-4 col-xl-3 d-flex align-items-center top-container">
                <div class="options-container fx-overlay-zoom-in w-100">
                    <div class="options-item block block-rounded block-transparent mb-0 content-container">
                        <div class="block-content text-center">
                            <p class="mb-2">
                                <i class="fa fa-folder fa-4x text-info"></i>
                            </p>
                            <p class="font-w600 font-size-lg mb-0">
                                ${data.folders[i]['name']}
                            </p>
                            <p class="font-size-sm text-muted">
                                (${data.folders[i]['file_count']})
                            </p>
                        </div>
                    </div>
                    <div class="options-overlay rounded-lg bg-white-50">
                        <div class="options-overlay-content" data-path = "${data.folders[i]['fullpath']}">
                            <div class="mt-3 mb-3">
                                <button class="btn btn-hero-light btn-open">
                                    <i class="fa fa-share text-primary mr-1"></i> Open
                                </button>
                            </div>
                            <div class="btn-group mb-3">
                                ${!!data.permissions['move'] ?
                                    `<button class="btn btn-sm btn-light btn-cut">
                                    <i class="fa fa-cut text-primary mr-1"></i>
                                    </button>
                                    <button class="btn btn-sm btn-light btn-paste">
                                        <i class="fa fa-paste mr-1"></i>
                                    </button>` : '' }
                                ${!!data.permissions['delete'] ?
                                    `<button class="btn btn-sm btn-light btn-delete-folder" data-toggle="tooltip" data-animation="true" data-placement="bottom" title="Really delete this folder?">
                                        <i class="fa fa-trash text-danger mr-1"></i>
                                    </button>` : '' }
                            </div>
                            ${!!data.permissions['rename'] ?
                                `<div class="form-group">
                                    <div class="input-group">
                                        <input type="text" value = "${data.folders[i]['name']}" data-type="folder" class="form-control inpt-rename" placeholder="type name...">
                                    </div>
                                </div>` : '' }
                        </div>
                    </div>
                </div>
            </div>
        `

    }

    // make html string to render on files part
    for (let i = 0; i < data.files.length; i++) {
        fileHTML += `
            <div class="col-sm-6 col-md-4 col-xl-3 d-flex align-items-center top-container">
                <div class="options-container w-100">
                    <div class="options-item block block-rounded block-transparent mb-0 content-container">
                        <div class="block-content text-center">
                            <p class="mb-2 overflow-hidden">
                                <img class="img-fluid" src="/storage/${data.files[i]['fullpath']}" alt="">
                            </p>
                            <p class="font-w600 mb-0">
                                ${data.files[i]['name']}
                            </p>
                            <p class="font-size-sm text-muted">
                                ${data.files[i]['size']}
                            </p>
                        </div>
                    </div>

                    <div class="options-overlay rounded-lg bg-white-50">
                        <div class="options-overlay-content" data-path = "${data.files[i]['fullpath']}">
                            <div class="mb-3">
                                <a class="btn btn-hero-light img-lightbox" href="/storage/${data.files[i]['fullpath']}">
                                    <i class="fa fa-eye text-primary mr-1"></i> View
                                </a>
                            </div>
                            <div class="btn-group mb-3">
                                ${!!data.permissions['move'] ?
                                    `<button class="btn btn-sm btn-light btn-cut">
                                        <i class="fa fa-cut text-primary mr-1"></i>
                                    </button>` : ''}
                                <a class="btn btn-sm btn-light" href="/file/download?path=${data.files[i]['fullpath']}">
                                    <i class="fa fa-download text-black mr-1"></i>
                                </a>
                                ${!!data.permissions['delete'] ?
                                    `<button class="btn btn-sm btn-light btn-delete-file" data-toggle="tooltip" data-animation="true" data-placement="bottom" title="Really delete this photo ?">
                                        <i class="fa fa-trash text-danger mr-1"></i>
                                    </button>` : ''}
                            </div>
                            ${!!data.permissions['rename'] ? 
                                `<div class="form-group">
                                    <div class="input-group">
                                        <input type="text" value = "${data.files[i]['name']}" class="form-control inpt-rename" placeholder="type name...">
                                    </div>
                                </div>` : '' }
                        </div>
                    </div>
                </div>
            </div>
        `
    }

    // attach thoes string to html element
    $('div#div_folder_container').html(folderHTML)
    $('div#div_file_container').html(fileHTML)

    // let tooltip work
    $("[data-toggle='tooltip']").tooltip()

    return;
}