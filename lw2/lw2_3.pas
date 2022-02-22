PROGRAM PrintHello(INPUT, OUTPUT);
USES
  Dos;

VAR
  NameStr: STRING;

BEGIN
  WRITELN('Content-Type: text/plain');
  NameStr := GetEnv('QUERY_STRING');
  IF POS('name=', NameStr) = 1
  THEN
    NameStr := Copy(NameStr, 6, Length(NameStr) - 5)
  ELSE
    NameStr := 'Anonymous';

  WRITELN;

  IF NameStr = 'Anonymous'
  THEN
    WRITELN('Hello ', NameStr, '!')
  ELSE
    WRITELN('Hello, dear ', NameStr, '!')

END.
