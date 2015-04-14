require.config({
	baseUrl: 'public',
    paths: {
        'jquery': 'vendors/js/jquery',
        'validate': 'vendors/js/jquery.validate',
        'bootstrap': 'vendors/js/bootstrap',
        'angular': 'vendors/js/angular',
        'app': 'js/main',
        'testModule': 'js/controllers/testModule'
    },
    shim: {
        'angular': {
            exports: ['angular']
        },
        'jquery': {
            exports: ['jquery']
        },
    	'validate': {
    		deps: ['jquery'],
            exports: 'validate'
    	},
    	'bootstrap': {
    		deps: ['jquery'],
            exports: 'bootstrap'
    	},
        'testModule': {
            deps: ['angular'],
            exports: 'testModule'
        },
        'app': {
            deps: [ 'angular', 'testModule' ],
            exports: 'app'
        }
    	
    }
});

require(['app', 'angular', 'bootstrap', 'jquery', 'validate', 'testModule'],function(){
	angular.bootstrap(document, ['app']);
});