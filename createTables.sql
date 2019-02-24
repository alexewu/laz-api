CREATE TABLE Students(
    SID INTEGER,
    First_Name VARCHAR2(100) NOT NULL,
    Last_Name VARCHAR2(100) NOT NULL,
    Password VARCHAR2(100) NOT NULL,
    Added VARCHAR2(100) NOT NULL,
    Removed VARCHAR2(100).
    PRIMARY KEY(SID)
);

CREATE TRIGGER add_Student
    BEFORE INSERT ON Students
    FOR EACH ROW
    BEGIN
        SELECT NOW() INTO :NEW.Added;
    END;
/