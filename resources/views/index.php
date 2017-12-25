<!DOCTYPE html>
<html lang="en-US" ng-app="libraryImages">
<head>
    <title>My library</title>
    <!-- Load Bootstrap CSS -->
    <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('css/custom.css') ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<header>
    <div class="container">
        <h2>My library</h2>
    </div>
</header>

<div class="content-library" ng-controller="galleryController">
    <div class="container">
        <div class="nav-library pull-right">
            <div class="btn-group" role="group" aria-label="nav-library">
                <button type="button" class="btn btn-default" ng-click="toggle(1)" ng-class="{'active': activeStatus == 1}">Active</button>
                <button type="button" class="btn btn-default" ng-click="toggle(0)" ng-class="{'active': activeStatus == 0}">Deleted</button>
            </div>
        </div>
        <div class="clearfix">

        </div>
        <div class="gallery">

            <div class="row" ng-hide="isEmpty(gallery)">
                <div class="col-md-3 col-sm-6" ng-repeat="image in gallery">
                    <div class="thumbnail" ng-click="imgSelect(image.id)" ng-class="{'selected-image': selectedImg == image.id}">
                        <a href="#">
                            <img ng-src="{{ thumnailPath + image.file_name }}" alt="{{ image.file_name }}">
                            <div class="caption">
                                <p class="text-center">{{ image.name }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div ng-show="isEmpty(gallery)" class="alert alert-warning" role="alert"> <strong>Library</strong> is empty. </div>

            <div class="gallery-control text-center" ng-show="selectedImg != 0">
                <div class="active-control" ng-show="activeStatus == 1">
                    <a download="{{ downloadName }}" href="{{ downloadPath }}" title="{{ downloadName }}">
                        <span class="glyphicon glyphicon-download-alt"></span>
                    </a>
                    <a href="#" ng-click="updateStatus(0)">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </div>
                <div class="deleted-control" ng-show="activeStatus == 0">
                    <a href="#" ng-click="updateStatus(1)">
                        <span class="glyphicon glyphicon-ok"></span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>



<!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
<script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>
<script src="<?= asset('js/jquery.min.js') ?>"></script>
<script src="<?= asset('js/bootstrap.min.js') ?>"></script>

<!-- AngularJS Application Scripts -->
<script src="<?= asset('app/app.js') ?>"></script>
<script src="<?= asset('app/controllers/gallery.js') ?>"></script>
</body>
</html>