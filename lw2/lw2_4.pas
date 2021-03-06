PROGRAM WorkWithQueryString(INPUT, OUTPUT);
USES
  Dos;

FUNCTION GetQueryStringParameter(Key: STRING): STRING;
VAR
  QStr: STRING;
  EndPos, StartPos: INTEGER;
BEGIN
  QStr := GetEnv('QUERY_STRING');
  GetQueryStringParameter := '';
  IF Pos(Key + '=', QStr) <> 0
  THEN
    BEGIN
      StartPos := POS(Key + '=', QStr) + Length(Key + '=');
      IF Pos('&', Copy(QStr, StartPos, Length(QStr) - StartPos + 1)) <> 0
      THEN
        EndPos := Pos('&', Copy(QStr, StartPos, Length(QStr) - StartPos + 1)) - 1
      ELSE
        EndPos := Length(QStr);
      GetQueryStringParameter := Copy(QStr, StartPos, EndPos)
    END
END;

BEGIN
  WRITELN('Content-Type: text/plain');

  WRITELN;

  WRITELN('First Name: ', GetQueryStringParameter('first_name'));
  WRITELN('Last Name: ', GetQueryStringParameter('last_name'));
  WRITELN('Age: ', GetQueryStringParameter('age'))
END.
