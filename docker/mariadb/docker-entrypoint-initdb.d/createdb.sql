CREATE DATABASE IF NOT EXISTS `news` COLLATE 'utf8_general_ci';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'root';

USE `news`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Technology', 'Technology news includes updates on gadgets, devices, software releases, scientific discoveries, and innovations in computing, electronics, telecommunications, artificial intelligence, robotics, and the internet.'),
(2, 'Health', '&#13;&#10;Health news includes updates on medical breakthroughs, research findings, disease outbreaks, public health initiatives, healthcare policies, and advancements in healthcare technology and treatments.'),
(3, 'Economy', '&#13;&#10;Economy news includes updates on financial markets, business trends, government policies, trade, employment, and economic growth.'),
(4, 'Art', 'Art news covers updates on exhibitions, events, artists, market trends, and creative developments in various art forms such as visual arts, performing arts, literature, and music.'),
(5, 'World', 'World news refers to updates and information about current events, developments, and issues of global significance happening across different countries and regions around the world.'),
(6, 'Sport', 'Sport news refers to updates and information about various sports, including events, matches, tournaments, athlete performances, team updates, and sports-related news and developments.'),
(7, 'Magazine', 'Magazine news refers to updates and information published in magazines, covering a wide range of topics such as lifestyle, fashion, entertainment, health, culture, and current events.'),
(8, 'Life', 'Life news refers to updates and information about various aspects of human life, including lifestyle, health, relationships, personal development, and current events that impact individuals&#39; daily lives.');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `date`, `user_id`, `news_id`) VALUES
(1, 'We are eagerly waiting :)', '2021-10-13 17:34:50', NULL, 1),
(2, 'Welcome queen!', '2021-10-13 17:34:57', 1, 1),
(3, 'Troubles keep arising these days.\"', '2021-10-13 17:35:42', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `editor_categories`
--

CREATE TABLE `editor_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `date`, `category_id`, `user_id`, `image`) VALUES
(1, 'Adele is making a comeback with her new single &#34;Easy on Me.&#34;', 'According to The Guardian, renowned singer Adele will be making a comeback with her new single &#34;Easy on Me&#34; on October 15th.&#13;&#10;&#13;&#10;In a 20-second black and white teaser clip, Adele announced her upcoming single &#34;Easy on Me.&#34; In the video, she is seen inserting an old cassette tape into her car&#39;s music player, and as she rolls down the car window, pages of sheet music start flying out.&#13;&#10;&#13;&#10;Following the release of her new single, Adele will also be releasing an album.&#13;&#10;&#13;&#10;Adele&#39;s album &#34;21&#34; entered the Guinness World Records with numerous records. She became the first artist to sell over three million copies in a year in the UK. Her song &#34;Hello&#34; won the Record of the Year, Song of the Year, and Best Pop Solo Performance awards at the 2017 Grammy Awards, while her album &#34;25&#34; won the Grammy for Best Pop Vocal Album and Album of the Year. With this year&#39;s victory, Adele became the second female artist in Grammy Awards history to win the Album of the Year award twice, following her win in 2012 with the album &#34;21.&#34;', '2021-10-13', 4, 2, 'adele-61673dd023c81.jpg'),
(3, 'Attention to those ordering food delivery from outside!', 'A new study conducted in the United States revealed the dangers posed by synthetic chemicals in consumer products. Experts are warning! These chemicals, such as &#34;phthalates&#34; (substances added to plastics to increase flexibility), which can be potentially lethal, are found in various places ranging from food packaging to children&#39;s toys.&#13;&#10;&#13;&#10;Phthalates, synthetic chemicals found in hundreds of consumer products such as food storage containers, shampoo, makeup, perfume, and children&#39;s toys, could be the cause of 100,000 deaths among individuals aged 55-64. This claim emerged as a result of a study conducted in the United States.&#13;&#10;&#13;&#10;According to a new study published in the journal Environmental Pollution, individuals exposed to high levels of phthalates have a higher risk of premature death compared to the risk of death from cardiovascular diseases.&#13;&#10;&#13;&#10;&#34;It interferes with the body&#39;s hormone production mechanism.&#34;&#13;&#10;The study suggests that this situation could cost the United States approximately $40 to $47 billion annually due to economic productivity loss.&#13;&#10;&#13;&#10;Dr. Leonardo Trasande, a professor of environmental medicine, stated, &#34;This study contributes to previous research on the impact of plastics on the human body and demonstrates the steps that need to be taken to reduce or eliminate plastic use.&#34;&#13;&#10;&#13;&#10;The study conducted at NYU Langone Health in New York revealed that phthalates interfere with the body&#39;s endocrine system, which is responsible for hormone production, and they are linked to &#34;development, reproduction, brain, immune, and other problems.&#34;&#13;&#10;&#13;&#10;The National Institute of Environmental Health Sciences also highlighted the importance of phthalate usage, stating that even minor hormonal disruptions could lead to &#34;significant developmental and biological effects.&#34;', '2021-10-13', 2, 2, '1634041083184-sip-61673ec7d519c.jpg'),
(4, 'Access problem with Snapchat', 'There is an access problem to the popular social media platform Snapchat. In a statement from Snapchat, it was acknowledged that there is an issue and they are investigating it.&#13;&#10;&#13;&#10;There is an access problem to Snapchat.&#13;&#10;&#13;&#10;Many users have reported that they are unable to access the popular application.&#13;&#10;&#13;&#10;The issue started around 14:33 and has been ongoing for approximately 3 hours, affecting users in Turkey as well.&#13;&#10;&#13;&#10;Statement from Snapchat&#13;&#10;In a statement from Snapchat, it was mentioned that they are aware that some Snapchat users are currently experiencing issues while using the application, and they are investigating the matter.', '2021-10-13', 1, 2, 'snap-61673ef25efb8.jpg'),
(5, 'Impact of chip crisis on iPhone 13 production: Apple shares declined.', 'Apple introduced the new iPhone 13 models in September.&#13;&#10;&#13;&#10;Due to the global computer chip shortage, there is a risk of not reaching the production targets for iPhone 13, and Apple&#39;s shares have also experienced a decline.&#13;&#10;&#13;&#10;According to a report by BBC, Apple aimed to produce 90 million iPhones in the last quarter of 2021. However, it was revealed that Apple informed its partners that this target could be approximately 10 million units lower.&#13;&#10;&#13;&#10;Following the news, Apple&#39;s shares dropped by 1.2 percent.&#13;&#10;&#13;&#10;Semiconductor manufacturers Broadcom and Texas Instruments also experienced a 1 percent decline in their shares after revealing chip supply issues with Apple.', '2021-10-13', 1, 2, 'apple-61673f1561c18.jpg'),
(6, 'Famous singer Emani 22 has passed away', 'American singer Emani Johnson, known as Emani 22, has passed away at the age of 22. The cause of her death has not been disclosed yet.&#13;&#10;&#13;&#10;Emani Johnson, the renowned R&#38;B singer also known as Emani 22, was announced to have passed away last night.&#13;&#10;&#13;&#10;Born on December 27, 1998, in Los Angeles, Emani was not only a singer but also a dancer. She released her album titled &#34;The Color Red&#34; in 2020.&#13;&#10;&#13;&#10;Rapper Bhad Bhabie shared a post on social media, expressing her disbelief and stating, &#34;I don&#39;t even know what to say. It doesn&#39;t feel real. I spent almost every day with you. You meant so much to me. You were my inspiration, and I will always miss you.&#34;', '2021-10-13', 7, 2, 'emani-61673f3c7a6c6.jpg'),
(7, 'Demet Akalın has left the &#34;Gelinim Mutfakta&#34; program', 'Demet Akalın, the host of the show &#34;Gelinim Mutfakta&#34; broadcasted on Kanal D, has announced her departure from the program. Fatih Ürek, the original host of the show, revealed Akalın&#39;s departure during an appearance on the program &#34;2. Sayfa.&#34;&#13;&#10;&#13;&#10;Akalın expressed her discontent with Ürek&#39;s comments and confirmed that she had indeed left &#34;Gelinim Mutfakta&#34; ten days ago. She cited her disciplined work schedule and the need for rest as reasons for her departure.&#13;&#10;&#13;&#10;Akalın also suggested other names as potential replacements for her role.', '2021-10-13', 7, 2, 'demet-61673f747385c.jpg'),
(9, 'Climate crisis: warned of the possibility of hundreds of people dying', 'The UK Environment Agency has issued a warning that hundreds of people could lose their lives due to floods across the country.&#13;&#10;&#13;&#10;According to the agency&#39;s report, the UK is not prepared for the impacts of climate change.&#13;&#10;&#13;&#10;Earlier this year, Germany experienced the loss of dozens of lives due to floods.&#13;&#10;&#13;&#10;The agency has stated that if adequate preparations for the effects of climate change are not made, such floods will inevitably occur in the UK.&#13;&#10;&#13;&#10;&#39;Adapt or die&#39;&#13;&#10;Emma Howard Boyd, Chair of the UK Environment Agency, said, &#34;We either adapt to the conditions or we die.&#34;', '2021-10-13', 5, 2, 'iklim-61673fedb2a50.jpg'),
(10, 'Cristiano Ronaldo is insatiable when it comes to breaking records!', 'In the October matches of the 2022 FIFA World Cup European qualifiers, Cristiano Ronaldo, the Portuguese star, scored a hat-trick for the 10th time. Portugal defeated Luxembourg 5-0 in the match where Ronaldo achieved this feat.&#13;&#10;&#13;&#10;With his 36th goal in World Cup qualifiers, Ronaldo&#39;s total number of hat-tricks in his career reached 58. He has now scored 115 goals for the Portuguese national team and holds the record for the most appearances in European national team matches with 182 games.', '2021-10-13', 6, 2, 'cristiano-616740232a496.jpg'),
(11, 'Fenerbahçe achieves historic profit', 'The &#34;big four&#34; clubs in Turkish football have announced their financial results. Fenerbahçe has achieved its highest quarterly profit in history, thanks to income from cryptocurrency. Galatasaray reported a profit, while Beşiktaş and Trabzonspor declared losses.&#13;&#10;&#13;&#10;The four major clubs disclosed their financial statements for the period of June-August. Fenerbahçe announced a record profit of 255.5 million TL, driven by income from cryptocurrency. Galatasaray also reported a profit for this period, while Beşiktaş and Trabzonspor incurred losses.&#13;&#10;&#13;&#10;As the shares of these clubs are traded on Borsa Istanbul, they released their third-quarter financial statements for 2021.&#13;&#10;&#13;&#10;Fenerbahçe, which had previously reported a net loss of 201.8 million TL in the previous quarter, achieved a record net profit of 255.5 million TL in the third quarter.&#13;&#10;&#13;&#10;In August, Fenerbahçe announced that it generated an income of 268.5 million TL from the pre-sale of &#34;Fenerbahçe tokens&#34; in partnership with the cryptocurrency trading platform Paribu. This income contributed to the profit figure in the third quarter.&#13;&#10;&#13;&#10;The club&#39;s revenue for the period, which was previously 120 million TL, increased to 471 million TL with the introduction of Fenerbahçe Tokens.', '2021-10-13', 6, 2, 'fenerbahce-616740491bfa7.jpg'),
(12, 'Neymar: 2022 will be my last World Cup', 'World-renowned star Neymar has expressed that the 2022 World Cup will be his last World Cup participation.&#13;&#10;&#13;&#10;Neymar, the star player of PSG, believes that the upcoming 2022 World Cup in Qatar will be his final opportunity. The Brazilian star stated that he does not expect to play in another World Cup after the tournament in 2022, as he believes the pressure of the game takes a toll on his body and mind.&#13;&#10;&#13;&#10;Speaking to DAZN, Neymar said, &#34;I think this will be my last World Cup to play. I see this tournament as a conclusion because I don&#39;t know if I will have the mental strength to deal with football anymore. Therefore, I will do everything to win it with my country and fulfill my biggest dream since childhood.&#34;&#13;&#10;&#13;&#10;Please note that this information is based on a hypothetical scenario and may not reflect the actual decision or future plans of Neymar.', '2021-10-13', 6, 2, 'neymar-6167407d0ccc3.jpg'),
(13, 'The &#34;equal pay for equal work&#34; bill has passed in the Italian Chamber of Deputies', 'A bill aimed at addressing the gender pay gap in the Italian business world has been approved by the lower house of parliament, the Chamber of Deputies. The legislation, known as the Equal Pay Act, was designed to promote women&#39;s workforce participation and encourage companies to implement equal pay practices for women and men.&#13;&#10;&#13;&#10;The bill, championed by Democratic Party member Chiara Gribaudo, was unanimously approved in the Chamber of Deputies today.&#13;&#10;&#13;&#10;For the bill to become law, it also needs to pass through the other house of parliament, the Senate.&#13;&#10;&#13;&#10;If enacted, employers who implement equal pay policies and reduce gender disparities in terms of advancement opportunities will be eligible to receive a &#34;gender equality certificate.&#34;&#13;&#10;&#13;&#10;Companies that obtain this certificate will benefit from financial incentives such as a reduction in social security contributions.&#13;&#10;&#13;&#10;Companies with over 50 employees will be required to regularly prepare personnel reports. If these reports are found to be incomplete or inaccurate, fines may be imposed on the companies.&#13;&#10;&#13;&#10;Companies with fewer than 50 employees can voluntarily prepare these reports to take advantage of the incentives.&#13;&#10;&#13;&#10;After the bill&#39;s approval in the Chamber of Deputies, Democratic Party member Chiara Gribaudo shared a celebratory message on social media, dedicating the achievement to all women who have fought for this cause. She concluded her message with the statement, &#34;Equal work, equal pay, we are equal.&#34;', '2021-10-13', 3, 2, 'italya-6167415d223ef.jpg'),
(14, 'Identification of individuals at currency exchange offices', 'The Ministry of Treasury and Finance stated that certain media outlets and social media platforms have published misleading and unsubstantiated claims regarding the regulation on currency exchange offices. The ministry emphasized that the new regulation aims solely to reduce informal activities in the sector, improve institutionalization, and ensure compliance with international standards. The statement clarified that the regulation does not involve any form of intervention in the foreign exchange markets.&#13;&#10;&#13;&#10;The ministry further explained that prior to the amendment of the regulation on October 12, 2021, there was no requirement for identification in foreign exchange transactions within the framework of exchange regulations. However, identification was mandatory for transactions that exceeded a transaction amount of 75,000 Turkish lira or the equivalent in multiple interconnected transactions, as well as for transactions exceeding $3,000 or its equivalent under tax legislation.', '2021-10-13', 3, 2, 'doviz-6167417f0f50b.jpg'),
(15, 'Adele: I can never afford to buy a house in London', 'After a six-year hiatus, Adele, who is preparing to release a new album, revealed that she couldn&#39;t afford to buy a house in London due to high costs. Instead, she disclosed that she moved to Los Angeles. Adele, known for being among the highest-earning female singers, sparked discussions on social media with her statements.', '2021-10-13', 8, 2, 'adl-616741d5d0823.jpg'),
(16, 'All COVID vaccine mandates have been banned in the state of Texas in the United States', 'Governor Greg Abbott of the state of Texas in the United States has signed an executive order lifting all COVID vaccine mandates. No institution in Texas, whether public or private, can require their employees or customers to receive the COVID-19 vaccine.&#13;&#10;&#13;&#10;According to a report by the Texas Tribune, Governor Greg Abbott announced the decision in a tweet stating, &#34;The COVID-19 vaccine is safe, effective, and our strongest defense against the virus, but it should always be voluntary and never forced.&#34;&#13;&#10;&#13;&#10;Abbott had previously allowed private businesses to mandate COVID vaccines for their employees.&#13;&#10;&#13;&#10;A separate executive order had already prohibited vaccine mandates in government entities in the state, leading to legal challenges. The state legislature had also banned businesses from requiring proof of vaccination from customers.&#13;&#10;&#13;&#10;On a national level, the Biden administration had called for all businesses with over 100 employees to mandate vaccines or require weekly PCR testing. The Biden administration had also made the COVID vaccine mandatory for federal employees.', '2021-10-13', 5, 2, 'as-61674223283ae.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `user_id`, `date`) VALUES
(3, 2, '2023-05-26 06:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_level` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `role_level`) VALUES
(1, 'Kadir', 'Erman', 'kadirermantr@gmail.com', '$2a$12$CTFdmIe.pPuxiKSQgIN2qerbBvc0XeHA.x0jzyIPL53uBZ886S.9C', 4),
(2, 'Admin', 'Lastname', 'admin@test.com', '$2a$12$CTFdmIe.pPuxiKSQgIN2qerbBvc0XeHA.x0jzyIPL53uBZ886S.9C', 4),
(3, 'Moderator', 'Lastname', 'moderator@test.com', '$2a$12$CTFdmIe.pPuxiKSQgIN2qerbBvc0XeHA.x0jzyIPL53uBZ886S.9C', 3),
(4, 'Editor', 'Lastname', 'editor@test.com', '$2a$12$CTFdmIe.pPuxiKSQgIN2qerbBvc0XeHA.x0jzyIPL53uBZ886S.9C', 2),
(5, 'User', 'Lastname', 'user@test.com', '$2a$12$CTFdmIe.pPuxiKSQgIN2qerbBvc0XeHA.x0jzyIPL53uBZ886S.9C', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_followed_categories`
--

CREATE TABLE `user_followed_categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_followed_categories`
--

INSERT INTO `user_followed_categories` (`id`, `user_id`, `category_id`) VALUES
(1, 1, 4),
(2, 1, 1),
(4, 1, 8),
(5, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_readed_news`
--

CREATE TABLE `user_readed_news` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_readed_news`
--

INSERT INTO `user_readed_news` (`id`, `user_id`, `news_id`) VALUES
(1, 1, 1),
(3, 1, 13),
(4, 1, 15),
(5, 1, 16),
(6, 1, 4),
(7, 2, 16),
(8, 2, 15),
(9, 2, 9),
(10, 2, 14),
(11, 2, 7),
(12, 2, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `editor_categories`
--
ALTER TABLE `editor_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_followed_categories`
--
ALTER TABLE `user_followed_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user_readed_news`
--
ALTER TABLE `user_readed_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `news_id` (`news_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `editor_categories`
--
ALTER TABLE `editor_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_followed_categories`
--
ALTER TABLE `user_followed_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_readed_news`
--
ALTER TABLE `user_readed_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_news` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `editor_categories`
--
ALTER TABLE `editor_categories`
  ADD CONSTRAINT `editor_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `editor_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `request_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_followed_categories`
--
ALTER TABLE `user_followed_categories`
  ADD CONSTRAINT `follow_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `follow_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_readed_news`
--
ALTER TABLE `user_readed_news`
  ADD CONSTRAINT `read_news` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `read_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;
