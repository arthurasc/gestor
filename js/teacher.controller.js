app.controller('tasks-controller', function($scope, $http){

  setUser('6');
  $scope.user = getUser();
  $scope.diaSemana;

  $http.get('http://localhost/gestao/libs/methods/task-methods/get-task.php').success(function(data){
    for(var i = 0; i < Object.keys(data).length; i++)
    {
      data[i].dia = setDia(data[i].dia);
      data[i].hora = setHorario(data[i].hora);
    }
    $scope.tasks = data;
  });

});

app.controller('check-controller', function($scope, $http){

  setUser('6');
  $scope.user = getUser();
  $scope.diaSemana;
  $scope.escola;

  $http.get('http://localhost/gestao/libs/methods/check-methods/get-check.php').success(function(data){
    for(var i = 0; i < Object.keys(data).length; i++)
    {
      data[i].dia = setDia(data[i].dia);
      data[i].horario = setHorario(data[i].horario);
    }
    $scope.check = data;
  });

});
