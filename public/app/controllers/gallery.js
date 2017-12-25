app.controller('galleryController', function($scope, $http, API_URL, IMG_THUMBNAIL_PATH, IMG_PATH) {

    var activeStatus = 1;
    var selectedImg = 0;
    var downloadName = "";
    var downloadPath = "#";

    // set active status, if we have selected active images or deleted
    // by default is 1
    // if is set then use that
    if (sessionStorage.getItem("activeStatus") !== null) {
        activeStatus = sessionStorage.getItem("activeStatus");
    }

    // get all images from API
    $http.get(API_URL + "library/" + activeStatus)
        .then(function(response) {
            $scope.gallery = response.data;
        });

    // set variables in scope
    $scope.thumnailPath = IMG_THUMBNAIL_PATH;
    $scope.activeStatus = activeStatus;
    $scope.selectedImg = selectedImg;
    $scope.downloadName = downloadName;
    $scope.downloadPath = downloadPath;

    // check is object from db is empty
    $scope.isEmpty = function (obj) {
        for (var i in obj) if (obj.hasOwnProperty(i)) return false;
        return true;
    };

    // change active status
    $scope.toggle = function(active) {
        sessionStorage.setItem("activeStatus", active);
        location.reload();
    };

    // select image
    $scope.imgSelect = function(id) {

        if(id == selectedImg) {
            selectedImg = 0;
            $scope.downloadName = "";
            $scope.downloadPath = "#";
        } else {
            selectedImg = id;
            $http.get(API_URL + "library/single/" + selectedImg)
                .then(function(response) {
                    // set download link
                    downloadName = response.data.file_name;
                    downloadPath = IMG_PATH + response.data.file_name;
                    $scope.downloadName = downloadName;
                    $scope.downloadPath = downloadPath;
                }).
                catch(function(data) {
                    console.log(data);
                    // unset download link
                    $scope.downloadName = "";
                    $scope.downloadPath = "#";
                    alert('Unable to set download link');
                });
        }

        $scope.selectedImg = selectedImg;
    };

    // change image status (deleted or active)
    $scope.updateStatus = function (status) {

        var message = 'Are you sure you want to ';
        var msg = '';

        // set confirm message
        switch(status) {
            case 0:
                msg = 'delete';
                break;
            case 1:
                msg = 'restore';
                break;
            default:
        }

        var isConfirm = confirm(message + msg + '?');
        if (isConfirm && selectedImg) {
            $http({
                method: 'POST',
                url: API_URL + 'library/update/',
                data: {
                    'id' : selectedImg,
                    'active' : status
                }
            }).
            then(function(data) {
                console.log(data);
                location.reload();
            }).
            catch(function(data) {
                console.log(data);
                alert('Unable to ' + msg);
            });
        } else {
            alert('Unable to ' + msg);
            return false;
        }
    }
});