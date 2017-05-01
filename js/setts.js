function setHorario(X)
{
  return X.length == 3 ? X[0] + ':' + X.substr(1, 2) : X.substr(0, 2) + ':' + X.substr(2, 2);
}

function setDia(X)
{
  var dia;
  switch(X)
  {
    case '1':
        dia = 'Segunda';
      break;
    case '2':
        dia = 'Terça';
      break;
    case '3':
        dia = 'Quarta';
      break;
    case '4':
        dia = 'Quinta';
      break;
    case '5':
        dia = 'Sexta';
      break;
    case '6':
        dia = 'Sábado';
      break;
  }
  return dia;
}

function fileChange()
{
  alert('colocar src no span, arquivo do script: setts.js');
}

function getUser()
{
  return window.localStorage.getItem('system-user-id');
}

function setUser(X)
{
  window.localStorage.setItem('system-user-id', X);
}
