angular.module("myapp", []).
    controller("mycntrl", function ($scope, $http) {
        $scope.insertData= function () {
            $http({
                method: 'POST',
                url: 'insert.php',
                data: {
                    ename: $scope.ename,
                    email: $scope.email,
                    phone: $scope.phone,
                    gender: $scope.gender,
                    experience: $scope.experience,
                    company: $scope.company,
                    source: $scope.interview_type,
                    position: $scope.position,
                    round: $scope.round,
                    date: $scope.date,
                    time: $scope.time,
                    comments: $scope.comments,
                }
            }).then(function (data) {
                console.log(data);
            },function (error) {
                console.log(error);
            })
        }

});
