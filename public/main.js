var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');



function deleteCategory(event){
    const data = {
        id: event.target.parentElement.parentElement.id
    }
    let jsonData = JSON.stringify(data);

    fetch("/deleteCategory", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            'X-CSRF-TOKEN': csrfToken
        },
        body: jsonData
    }).then(function (response) {
            location.reload();
    })
}


function setCategory(event){
    const data = {
        id: event.target.parentElement.parentElement.id,
        input: document.getElementById(event.target.parentElement.parentElement.id).getElementsByClassName('button-group')[0].getElementsByClassName('edit-input')[0].value
    }
    let jsonData = JSON.stringify(data);

    fetch("/editCategory", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            'X-CSRF-TOKEN': csrfToken
        },
        body: jsonData
    }).then(function (response) {
            location.reload();
    })
}


function addCategory(event){
    const data = {
        id: event.target.parentElement.parentElement.id,
        input: document.getElementById(event.target.parentElement.parentElement.id).getElementsByClassName('button-group')[0].getElementsByClassName('add-input')[0].value
    }
    let jsonData = JSON.stringify(data);

    fetch("/addCategory", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            'X-CSRF-TOKEN': csrfToken
        },
        body: jsonData
    }).then(function (response) {
        location.reload();
    })
}


function editCategoryInfo(id){
    const data = {
        id: id,
        input: document.getElementsByClassName('info-input')[0].value
    }
    let jsonData = JSON.stringify(data);

    fetch("/editInfoSingle", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            'X-CSRF-TOKEN': csrfToken
        },
        body: jsonData
    }).then(function (response) {
        location.reload();
    })
}
