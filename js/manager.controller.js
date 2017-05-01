app.controller('user-controller', function($scope, $http){

	$http.get('http://localhost/gestao/libs/methods/user-methods/get-user.php').success(function(data){
		$scope.users = data;
	});

	$scope.deleteUser = function(X)
	{
		if(confirm("A operação não poderá ser revertida, deseja continuar?"))
		{
			window.location.href = "libs/methods/user-methods/delete-user.php?i=" + X;
		}
	}

});

app.controller('school-controller', function($scope, $http){

  $http.get('http://localhost/gestao/libs/methods/school-methods/get-school.php').success(function(data){
		$scope.schools = data;
	});

  $scope.deleteSchool = function(X)
  {
    if(confirm("A operação não poderá ser revertida, deseja continuar?"))
    {
      window.location.href = "libs/methods/school-methods/delete-school.php?i=" + X;
    }
  }

});

app.controller('class-controller', function($scope, $http){

  $http.get('http://localhost/gestao/libs/methods/school-methods/get-school.php').success(function(data){
		$scope.schools = data;
	});

  $http.get('http://localhost/gestao/libs/methods/user-methods/get-user.php').success(function(data){
		$scope.users = data;
	});

  $http.get('http://localhost/gestao/libs/methods/class-methods/get-class.php').success(function(data){
    for (var i = 0; i < Object.keys(data).length; i++)
    {
      data[i].horario = setHorario(data[i].horario);
      data[i].dia = setDia(data[i].dia);
    }
    $scope.class = data;
	});

  $scope.deleteClass = function(X)
  {
    if(confirm("A operação não poderá ser revertida, deseja continuar?"))
    {
      window.location.href = "libs/methods/class-methods/delete-class.php?i=" + X;
    }
  }

});


app.controller('lessons-controller', function($scope, $http){

  $http.get('http://localhost/gestao/libs/methods/lessons-methods/get-lessons.php').success(function(data){
		$scope.lessons = data;
	});

  $scope.deleteLesson = function(X)
  {
    if(confirm("A operação não poderá ser revertida, deseja continuar?"))
    {
      window.location.href = "libs/methods/lessons-methods/delete-lesson.php?i=" + X;
    }
  }

});


app.controller('schedule-controller', function($scope, $http){

	$http.get('http://localhost/gestao/libs/methods/user-methods/get-user.php').success(function(data){
		$scope.users = data;
	});

  $http.get('http://localhost/gestao/libs/methods/schedule-methods/get-schedule.php').success(function(data){

    for(var i=0; i < Object.keys(data).length; i++)
    {
      data[i].hora = setHorario(data[i].hora);
      data[i].dia = setDia(data[i].dia);
    }

		$scope.tasks = data;
	});

  $scope.deleteTask = function(X)
  {
    if(confirm("A operação não poderá ser revertida, deseja continuar?"))
    {
      window.location.href = "libs/methods/schedule-methods/delete-schedule.php?i=" + X;
    }
  }

});
