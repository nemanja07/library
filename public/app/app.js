var app = angular.module('libraryImages', [])
    .constant('API_URL', 'http://192.168.33.10:5000/api/')
    .constant('IMG_PATH', 'http://192.168.33.10:5000/images/library/')
    .constant('IMG_THUMBNAIL_PATH', 'http://192.168.33.10:5000/images/thumbnail/');
