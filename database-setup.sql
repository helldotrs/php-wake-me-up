CREATE TABLE my_table (
    day INT CHECK (day >= 1 AND day <= 31)
);

INSERT INTO my_table (day) VALUES (1);
