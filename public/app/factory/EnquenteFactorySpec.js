describe('Service: enquete.enquente', function () {

    // load the service's module
    beforeEach(module('enquete'));

    // instantiate service
    var service;

    //update the injection
    beforeEach(inject(function (enquente) {
        service = enquente;
    }));

    /**
     * @description
     * Sample test case to check if the service is injected properly
     * */
    it('should be injected and defined', function () {
        expect(service).toBeDefined();
    });
});
