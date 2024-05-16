CREATE DATABASE WCFTCodeChallangeDB
GO

/****** Object:  Table [dbo].[patients]    Script Date: 5/16/2024 7:29:59 AM ******/

USE WCFTCodeChallangeDB
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[patients](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[first_name] [nvarchar](100) NOT NULL,
	[surname] [nvarchar](100) NOT NULL,
	[date_of_birth] [date] NOT NULL,
	[age] [int] NOT NULL,
	[total_score] [int] NULL,
	[created_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[patients] ADD  DEFAULT (getdate()) FOR [created_at]
GO


/****** Object:  Table [dbo].[questions]    Script Date: 5/16/2024 7:30:46 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[questions](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[panel] [nvarchar](50) NOT NULL,
	[question_text] [nvarchar](max) NOT NULL,
	[max_score] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO

/****** Object:  Table [dbo].[patient_responses]    Script Date: 5/16/2024 7:28:54 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[patient_responses](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[patient_id] [int] NOT NULL,
	[question_id] [int] NOT NULL,
	[score] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[patient_responses]  WITH CHECK ADD FOREIGN KEY([patient_id])
REFERENCES [dbo].[patients] ([id])
GO

ALTER TABLE [dbo].[patient_responses]  WITH CHECK ADD FOREIGN KEY([question_id])
REFERENCES [dbo].[questions] ([id])
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
CREATE TABLE users (
    id INT IDENTITY(1,1) PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(250) NOT NULL
);

INSERT INTO users(username, password) VALUES ('admin@test.com', '$2y$10$vQJhUkeCweAq41LT7PBLTOOFb4pQl8XLXIf6VApZjQWJ4PeUlSZeG'
$2y$10$6xh12rAtt9S.F7ujIywAiO9kak/bnhN8b1vWN/fz6OiAj/95/Fh12);