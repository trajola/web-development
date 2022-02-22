PROGRAM SarahRevere(INPUT, OUTPUT);
USES
  Dos;

VAR
  LanternStr: STRING;

BEGIN
  WRITELN('Content-Type: text/plain');
  LanternStr := GetEnv('QUERY_STRING');
  IF POS('Lanterns=', LanternStr) = 1
  THEN
    LanternStr := Copy(LanternStr, 10, 1)
  ELSE
    LanternStr := 'NO';

  WRITELN;

  IF LanternStr = '1'
  THEN
    WRITELN('The British are coming by land.')
  ELSE
    IF LanternStr = '2'
    THEN
      WRITELN('The British are coming by sea.')
    ELSE
      WRITELN('The North Church shows only ''', LanternStr, '''.')
END.
