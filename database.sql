CREATE DATABASE WCFTCodeChallangeDB
GO

CREATE TABLE patients (
    id INT IDENTITY(1,1) PRIMARY KEY,
    first_name NVARCHAR(100) NOT NULL,
    surname NVARCHAR(100) NOT NULL,
    date_of_birth DATE NOT NULL,
    age INT NOT NULL
);

GO

CREATE TABLE questions (
    id INT IDENTITY(1,1) PRIMARY KEY,
    panel NVARCHAR(50) NOT NULL,
    question_text NVARCHAR(MAX) NOT NULL,
    max_score INT NOT NULL
);

GO

CREATE TABLE patient_responses (
    id INT IDENTITY(1,1) PRIMARY KEY,
    patient_id INT NOT NULL,
    question_id INT NOT NULL,
    score INT NOT NULL,
    FOREIGN KEY (patient_id) REFERENCES patients(id),
    FOREIGN KEY (question_id) REFERENCES questions(id)
);
GO

INSERT INTO questions (panel, question_text, max_score) VALUES
('Brief Pain Inventory (BPI)', 'How much relief have pain treatments or medications FROM THIS CLINIC provided?', 100),
('Brief Pain Inventory (BPI)', 'Please rate your pain based on the number that best describes your pain at its WORST in the past week.', 10),
('Brief Pain Inventory (BPI)', 'Please rate your pain based on the number that best describes your pain at its LEAST in the past week.', 10),
('Brief Pain Inventory (BPI)', 'Please rate your pain based on the number that best describes your pain on the Average.', 10),
('Brief Pain Inventory (BPI)', 'Please rate your pain based on the number that best describes your pain that tells how much pain you have RIGHT NOW.', 10),
('Brief Pain Inventory (BPI)', 'Based on the number that best describes how during the past week pain has INTERFERED with your: General Activity.', 10),
('Brief Pain Inventory (BPI)', 'Based on the number that best describes how during the past week pain has INTERFERED with your: Mood.', 10),
('Brief Pain Inventory (BPI)', 'Based on the number that best describes how during the past week pain has INTERFERED with your: Walking ability.', 10),
('Brief Pain Inventory (BPI)', 'Based on the number that best describes how during the past week pain has INTERFERED with your: Normal work (includes work both outside the home and housework).', 10),
('Brief Pain Inventory (BPI)', 'Based on the number that best describes how during the past week pain has INTERFERED with your: Relationships with other people.', 10),
('Brief Pain Inventory (BPI)', 'Based on the number that best describes how during the past week pain has INTERFERED with your: Sleep.', 10),
('Brief Pain Inventory (BPI)', 'Based on the number that best describes how during the past week pain has INTERFERED with your: Enjoyment of life.', 10);

GO
