-- phpMyAdmin SQL Dump
-- version 5.2.1-1.el8
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 23 2025 г., 05:03
-- Версия сервера: 8.0.41-32
-- Версия PHP: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `p514771_pets`
--

-- --------------------------------------------------------

--
-- Структура таблицы `breed`
--

CREATE TABLE `breed` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `breed`
--

INSERT INTO `breed` (`id`, `name`, `type`) VALUES
(1, 'golden retriver', 'dog'),
(2, 'husky', 'dog'),
(3, 'no breed', 'dog'),
(4, 'no breed', 'cat'),
(5, 'German Shepherd', 'dog'),
(6, 'Beagle', 'dog'),
(7, 'Yorkshire Terrier', 'dog'),
(8, 'Newfoundland dog', 'dog'),
(9, 'Maine Coon', 'cat'),
(10, 'Persian cat', 'cat'),
(11, 'British Shorthair', 'cat'),
(12, 'Scottish Fold', 'cat'),
(13, 'no breed', 'bird'),
(14, 'no breed', 'turtle');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'cat grooming'),
(3, 'dog food'),
(4, 'cat food'),
(7, 'cat toys'),
(8, 'dog toys'),
(9, 'dog grooming'),
(10, 'Veterinary'),
(11, 'puppies'),
(12, 'kitties');

-- --------------------------------------------------------

--
-- Структура таблицы `market`
--

CREATE TABLE `market` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` float NOT NULL,
  `path` text COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `category_id` int NOT NULL,
  `date` date NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `avatar_path` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `profile_description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `market`
--

INSERT INTO `market` (`id`, `title`, `description`, `price`, `path`, `category`, `category_id`, `date`, `nickname`, `avatar_path`, `profile_description`, `user_id`) VALUES
(7, 'Royal Canin Maxi Adult 15kg', 'Complete feed for dogs - For adult large breed dogs (from 26 to 44 kg) - From 15 months to 5 years old.', 9500, '/web/img/market/67c4697e35517.png', 'dog food', 3, '2025-03-02', 'tali_dog', 'web/img/Proflie/67a72b69b5e23.jpeg', 'Hello! This is my profile', 1),
(8, 'Royal Canin Persian Kitten', 'Royal Canin Persian breed-specific dry kitten food is formulated to meet the nutritional needs of a growing kitten up to 12 months old', 1290, '/web/img/market/67c469a369425.webp', 'cat food', 4, '2025-03-02', 'tali_dog', 'web/img/Proflie/67a72b69b5e23.jpeg', 'Hello! This is my profile', 1),
(9, 'Golden retriever puppy', 'Golden Retrievers are an adaptable breed, meaning they are better at adapting to seasonal changes and various types of climate than certain other breeds. Goldens sport a double-coat, which ensures that these sweet pups are able to tolerate slightly colder temperatures than their friends from other breeds.', 58000, '/web/img/market/67c46a30c4790.jpeg', 'puppies', 11, '2025-03-02', 'tali_dog', 'web/img/Proflie/67a72b69b5e23.jpeg', 'Hello! This is my profile', 1),
(10, 'Royal Canin Golden Retriever Puppy', 'Royal Canin Golden Retriever Puppy dry dog food is designed to meet the nutritional needs of purebred Golden Retrievers 8 weeks to 15 months old', 1270, '/web/img/market/67c46aa46757a.jpg', 'dog food', 3, '2025-03-02', 'tali_dog', 'web/img/Proflie/67a72b69b5e23.jpeg', 'Hello! This is my profile', 1),
(11, 'Royal Canin Joint Care Maxi Dog 10 kg', 'Give your big furry friend the gift of pain-free movement with Royal Canin Joint Care Maxi Dog! Large dogs are more susceptible to joint issues, which can impact their mobility and quality of life. This specially formulated food aids your pet\'s joint health, keeping them happy and active!', 7115, '/web/img/market/67c46d1407a8b.webp', 'dog food', 3, '2025-03-02', 'tali_dog', 'web/img/Proflie/65ae01ecb48e0.jpeg', 'This is my profile', 57),
(12, 'Interactive Cat Toy Tower with Rotating Balls', 'Durable Plastic Three-Level Track and Ball Play Structure, Entertaining and Stimulating Pet Activity Center, No Batteries Needed', 250, '/web/img/market/67c5824b3ce40.webp', 'cat toys', 7, '2025-03-03', 'tali_dog', 'web/img/Proflie/65ae01ecb48e0.jpeg', 'This is my profile', 57),
(15, 'Royal Canin Size Health Nutrition Giant Adult - 15 KG', 'ROYAL CANIN® Giant Adult is meticulously crafted to meet the unique nutritional needs of adult giant breed dogs weighing 45kg and over. This premium dog food is designed to support your giant dog\'s bone, joint, and overall health, ensuring they thrive and maintain their vitality.', 6500, '/web/img/market/67cad366703ff.webp', 'dog food', 3, '2025-03-07', 'mikedog', 'web/img/Proflie/67cac27e43969.jpeg', 'This is my profile', 59),
(16, 'Royal Canin Breed Health Nutrition Adult Shih Tzu Dry Dog Food 1.5kg', 'Royal Canin Dry Food\r\nSpecific Breed: Shih Tzu Adult\r\nOver 10 months old\r\nHealthy Skin: Adult helps support the skin “barrier” role (exclusive complex), maintain skin health (EPA and DHA, vitamin A) and nourish the coat. Enriched with borage oil\r\nDental Health: This formula helps reduce the risk of tartar formation thanks to calcium chelators\r\nStool and  Odour Reduction: This formula helps reduce faecal smell and volume\r\nExclusive Kibble Design: Special Brachycephalic Jaw: A kibble exclusively designed to make it easier for the Shih Tzu to pick up and to encourage him to chew', 965, '/web/img/market/67cd33f1b7bf1.webp', 'dog food', 3, '2025-03-09', 'tali_dog', 'web/img/Proflie/65ae01ecb48e0.jpeg', 'This is my profile', 57),
(22, 'Funny Cat Toy Mouse Sound Squeaky Toys for Pet Cats Kitten Simulation Accessories', 'Size:6*3*2.5CM\r\n\r\n\r\n\r\nPackage:\r\n\r\n1 x toy', 70, '/web/img/market/68246a63e98c0.jpg', 'cat toys', 7, '2025-05-14', 'tali_dog', 'web/img/Proflie/65ae01ecb48e0.jpeg', 'This is my profile', 57),
(23, 'Mewoo - Whack-A-Mole Cat Toy', 'Introduce a world of endless fun for your feline friend with our Whack-A-Mole Cat Toy! This fun, interactive toy features a crafted wooden box with multiple holes, inside which is a variety of elusive \"moles\" for your cat’s playful pouncing. Your pet will be endlessly entertained as they try to catch the moles, which dart in and out randomly, stimulating their natural hunting instincts. This Whack-A-Mole Cat Toy comes with a bag of catnip that can be placed inside the paw design of the toy\'s handles; this provides a long-lasting blissful playtime for cats! Keep your cat active, engaged, and mentally stimulated with this Whack-A-Mole Cat Toy. Perfect for cats at every stage of life, this fun and surprising toy is expertly designed to cater to your purfect baby\'s curiosity while providing a healthy dose of exercise and entertainment.', 2999, '/web/img/market/68246b44ddbfb.webp', 'cat toys', 7, '2025-05-14', 'tali_dog', 'web/img/Proflie/65ae01ecb48e0.jpeg', 'This is my profile', 57),
(24, 'LEGEND SANDY Dog Squeaky Toys for Small Dogs, 12 Pack', '12 PACK PUPPY TOYS FOR ALL OCCASIONS: Various fun in one set! Including 7 pack dog squeaky toys raccoon, monkey, cactus, dog, duck, cow, hedgehog, and 5 pack natural cotton dog rope toys for teething puppies. Great value for the number of cute dog toys you get, which meet different requirements of a dog’s daily life requirements, such as chewing, training, and interactive playing. Whether you participate in the game or not, your dog can be happy, give you a choice to relax', 1837, '/web/img/market/68247f2ea07be.jpg', 'dog toys', 8, '2025-05-14', 'Mike_dog', 'web/img/Proflie/68247db1d49d5.jpeg', 'Hi! Welcome to my profile. I love pets', 65),
(25, 'Whiskas® Tuna Dry Cat Food 1.2KG', 'WHISKAS® cat food is complete and balanced, specially designed to fulfil your cat’s needs at every life stage. At the age of 12 months, your kitten turns adult, and requires a different nutritional needs. This change in nutritional needs will change again when they turn 7.\r\n\r\nCats aged 1-6 need lots of playtime and a balanced diet to help them stay lean and healthy. Cats are carnivores while humans omnivores, so cats need two times more protein than us. They also need 41 essential nutrients for optimum health. WHISKAS® understands the nutritional needs of cats, and every product is specially designed to be complete and balanced.', 999, '/web/img/market/682480de8c036.png', 'cat food', 4, '2025-05-14', 'Mike_dog', 'web/img/Proflie/68247db1d49d5.jpeg', 'Hi! Welcome to my profile. I love pets', 65),
(26, 'Whiskas Kitten (2-12 months) Wet Cat Food, Chicken in Gravy 6 Pouches 85 gm each', 'Brand	WHISKAS\r\nFlavour	Chicken\r\nItem Weight	1.02 Kilograms\r\nItem Form	Gravy, Wet\r\nAge Range (Description)	Baby', 2365, '/web/img/market/68248169a9fdf.jpg', 'cat food', 4, '2025-05-14', 'Mike_dog', 'web/img/Proflie/68247db1d49d5.jpeg', 'Hi! Welcome to my profile. I love pets', 65),
(27, 'Royal Canin Feline Care Nutrition Hair & Skin 85g Cat Wet Food', 'For adult cats\r\nThin slices in gravy\r\nHelps maintain coat beauty\r\nWith omega 3 & omega 6 fatty acids', 75, '/web/img/market/682482021d6ee.jpg', 'cat food', 4, '2025-05-14', 'Mike_dog', 'web/img/Proflie/68247db1d49d5.jpeg', 'Hi! Welcome to my profile. I love pets', 65),
(28, 'Royal Canin Regular Fit 32 Cat', 'All humans want to stay fit. And so do our cats, despite their eagerness to eat and do nothing. Help maintain your cat’s healthy weight with the high-quality nutrition of Royal Canin Regular Fit 32 Cat.', 2765, '/web/img/market/682482b0e8445.jpeg', 'cat food', 4, '2025-05-14', 'Mike_dog', 'web/img/Proflie/68247db1d49d5.jpeg', 'Hi! Welcome to my profile. I love pets', 65),
(29, 'Pedigree Complete Nutrition Roasted Chicken, Rice, And Vegetable Dry Dog Food, 14 Lb Bag', 'Dogs bring out the good in us. Pedigree brings out the good in them. Express your love for your dog by serving Pedigree Complete Nutrition Adult Small Dog Dry Dog Food, Chicken, Rice and Vegetable Flavor recipe. This great-tasting dry dog recipe is made with small pieces to meet the unique needs of your small breed dog and contains whole grains, protein, and accents of vegetables. To support your dog’s health and vitality, this dry dog food recipe is formulated with 36 vitamins, minerals, and amino acids. It also contains Omega 6 Fatty Acid and Zinc to help nourish a healthy skin and coat. With no high fructose corn syrup, artificial flavors, or added sugars, Pedigree Complete Nutrition Adult Small Dog Dry Dog Food, Chicken, Rice and Vegetable Flavor shows your dog that you care…and have great taste.', 2173, '/web/img/market/682483371f711.webp', 'dog food', 3, '2025-05-14', 'Mike_dog', 'web/img/Proflie/68247db1d49d5.jpeg', 'Hi! Welcome to my profile. I love pets', 65),
(30, 'Pedigree Adult Chicken and Vegetables Dry Dog Food 1.5kg', 'Pedigree Adult Dry Dog Food\r\nChicken and Vegetables Flavor\r\nScientifically proven shinier coat in 6 weeks\r\nCalcium and Phosphorous - for strong bones and teeth\r\nDietary Fiber - for digestive system\r\nProtein - for strong muscles\r\nVitamins and Minerals - for strong immune system', 310, '/web/img/market/6824838da9649.webp', 'dog food', 3, '2025-05-14', 'Mike_dog', 'web/img/Proflie/68247db1d49d5.jpeg', 'Hi! Welcome to my profile. I love pets', 65),
(31, 'Cat grooming Baguio', 'Treat your furry friend to a spa day without leaving the house! ????✨ Our expert groomers come to you, providing top-quality grooming in the comfort of your home. Book now for a stress-free grooming experience!', 2000, '/web/img/market/682486ca52d7c.jpg', 'cat grooming', 2, '2025-05-14', 'Mike_dog', 'web/img/Proflie/68247db1d49d5.jpeg', 'Hi! Welcome to my profile. I love pets', 65),
(32, 'Vet clinic', 'We provide pet vet services in Baguio City', 1000, '/web/img/market/682487ac9b074.jpg', 'Veterinary', 10, '2025-05-14', 'Mike_dog', 'web/img/Proflie/68247db1d49d5.jpeg', 'Hi! Welcome to my profile. I love pets', 65),
(33, 'Dog grooming services', 'We provide dog grooming services in Baguio City', 1500, '/web/img/market/682488211477a.jpeg', 'dog grooming', 9, '2025-05-14', 'Mike_dog', 'web/img/Proflie/68247db1d49d5.jpeg', 'Hi! Welcome to my profile. I love pets', 65),
(34, 'Royal Canin, Canine Care Nutrition Digestive Care Adult Loaf in Sauce - Wet Dog Food', 'Royal Canin, Can Adult - Digestive Care - 385 g\r\n\r\nFounded by a veterinarian, Royal Canin has over 40 years experience in Health Nutrition. Our work with veterinarians, pet nutritionists, breeders and dog professionals from around the world has provided us with knowledge about the specific nutritional requirements of dogs. This knowledge has allowed us to formulate the precise diet for your dogs special needs.', 2300, '/web/img/market/682488a87af66.jpg', 'dog food', 3, '2025-05-14', 'Mike_dog', 'web/img/Proflie/68247db1d49d5.jpeg', 'Hi! Welcome to my profile. I love pets', 65),
(35, 'Royal Canin Vet Diet Gastro Intestinal Low Fat Dog Food - Can 420g', 'Combination of highly digestible proteins and starches, prebiotics, beet pulp and fish oil helps support digestive security. A low fat concentration improves digestive function in dogs with hyperlipidaemia or with acute pancreatitis. Adjusted levels of soluble/insoluble fibres to help limit fermentations and promote good stools quality. The synergistic antioxidant complex reduces oxidative stress and fights free radicals', 385, '/web/img/market/682489c88fc95.webp', 'dog food', 3, '2025-05-14', 'Mike_dog', 'web/img/Proflie/68247db1d49d5.jpeg', 'Hi! Welcome to my profile. I love pets', 65),
(36, 'Royal Canin Fiber Canine', 'Increased levels and an optimal blend of soluble and insoluble fibre help maintain intestinal health. Digestive aids help restore the intestinal flora and promote intestinal health. Help reduce inflammation and promote healthy skin and a luxurious coat.', 4000, '/web/img/market/68248a1a65845.webp', 'dog food', 3, '2025-05-14', 'Mike_dog', 'web/img/Proflie/68247db1d49d5.jpeg', 'Hi! Welcome to my profile. I love pets', 65),
(37, 'Pedigree Beef Dog Food 700g (Can)', '\r\nPedigree Beef Dog Food Can (700g)\r\nAdult Complete Nutrition for Dogs has been reformulated to give grown dogs all the energy and nourishment they need to continue living life to its fullest\r\nThe zinc and linoleic acid in this recipe help keep adult dogs looking like best-in-show winners, and leading levels of antioxidant vitamins E & C work with their immune system to keep them feeling like a puppy', 139, '/web/img/market/68248aa0a268c.webp', 'dog food', 3, '2025-05-14', 'Mike_dog', 'web/img/Proflie/68247db1d49d5.jpeg', 'Hi! Welcome to my profile. I love pets', 65),
(38, 'Pedigree® Choice Cuts Pouch Adult Wet Dog Food & Meal Topper - 30 Count, Variety Pack', 'Dogs bring out the good in us. Pedigree brings out the good in them. Express your love for your dog by serving Pedigree Choice Cuts In Gravy Adult Soft Wet Dog Food Variety Pack. These great-tasting wet dog food recipes are 100% complete and balanced for adult dogs and are made with real beef or real chicken, bringing a filling and familiar flavor to mealtime. Pedigree Choice Cuts In Gravy Adult Soft Wet Dog Food Variety Pack features three delicious flavors: Hickory Smoked Chicken Flavor, Filet Mignon Flavor, and Beef, Noodles & Vegetables Flavor so your dog can have favorites to choose from. This versatile soft dog food can be served as a topper, mixed with dry dog food, or enjoyed by itself as a complete meal for adult dogs, bringing your dog a variety of ways to indulge. Crafted with no high fructose corn syrup, artificial flavors, or added sugars although, trace amounts may be present due to potential cross-contact at manufacturing, Pedigree Choice Cuts In Gravy Adult Soft Wet Dog Food Variety Pack shows your dog that you care and have great taste.', 1500, '/web/img/market/68248ae5f0440.jpeg', 'dog food', 3, '2025-05-14', 'Mike_dog', 'web/img/Proflie/68247db1d49d5.jpeg', 'Hi! Welcome to my profile. I love pets', 65),
(39, 'Royal Canin Puppy Mini Wet Puppy Food (1-10kg) - 85 g packs', 'Your puppy\'s growth period is an important life stage; it\'s the time of discovery and change. While your puppy is still growing, it\'s important that its diet supports optimal health. Suitable for puppies aged up to 10 months that will have an adult weight of up to 10kg, ROYAL CANIN Mini Puppy in Gravy is specially formulated with all the nutritional needs of your mini puppy in mind. ROYAL CANIN Mini Puppy in Gravy contains an exclusive complex of antioxidants including vitamin-E to support its juvenile immune system while it\'s still maturing. ROYAL CANIN Mini Puppy in Gravy also contains many beneficial nutrients that help to support your puppy\'s general digestive health. What\'s more, the intense energy content in ROYAL CANIN Mini Puppy in Gravy will meet the high energy needs of your small breed puppy. To cater to each dog\'s individual preferences, ROYAL CANIN Mini Puppy is also available as dry food, with crunchy and tasty kibble. If you\'re considering mixed feeding, simply follow our feeding guidelines to ensure your dog gets an accurate amount of both wet and dry food for optimal benefit.', 389, '/web/img/market/68248ba05cc79.webp', 'dog food', 3, '2025-05-14', 'Mike_dog', 'web/img/Proflie/68247db1d49d5.jpeg', 'Hi! Welcome to my profile. I love pets', 65),
(40, 'Royal Canin Medium Ageing 7+ Dry Adult Dog Food 15kg', 'As your medium-sized dog enters their later adult years, they may not be as active as they used to be, but they\'ll still typically have their playful, spirited and loyal personality. Therefore, your dog should have a diet that suits their size, age and nutritional needs. For dogs aged over 7 years old, Royal Canin Medium Adult 7+ is a nutritionally complete and balanced formula specially designed to meet your medium dog\'s particular needs and support them throughout the latter stages of adulthood. Designed for medium-sized dogs that weigh between 11 and 25kg, this formula contains a complex of vitamins to help maintain their vitality and overall health. Medium-sized dogs rely on consistent exercise for proper muscle development, and this doesn\'t change as they get older. With its specialised, high-quality protein content, this kibble is crafted to help your adult dog maintain muscle mass.', 4000, '/web/img/market/68248c069f8e2.jpg', 'dog food', 3, '2025-05-14', 'Mike_dog', 'web/img/Proflie/68247db1d49d5.jpeg', 'Hi! Welcome to my profile. I love pets', 65),
(41, 'Royal Canin Urinary Care Cat Slices in Gravy (12 x 85 g)', 'Cats are known for not drinking enough water. But unfortunately, this can negatively impact their bladder health. That’s why Royal Canin Urinary Care Cat Slices in Gravy tends specifically to your cat\'s urinary function by delivering tailored nutrition.\r\n\r\nThis wet food has an 82% moisture content to promote urine dilution. By lowering chemical concentration, these pouches decrease the risk of bladder stones.  \r\n\r\nNutrition plays a significant role in maintaining healthy mineral levels in the bladder. Royal Canin Urinary Care Cat Slices in Gravy features high-quality nutrients with tailored mineral levels. So your little lion doesn’t have to compromise on nourishment to have a healthy urinary system.\r\n\r\nSince urinary problems are more frequent in overweight cats, this recipe promotes ideal weight maintenance with a carefully adapted calorie content.\r\n\r\nLastly, Royal Canin\'s nutritionists developed this wet cat food to match the macronutrient profile that adult cats instinctively prefer, thereby boosting their well-being.', 2717, '/web/img/market/68248c78c52e0.webp', 'cat food', 4, '2025-05-14', 'Mike_dog', 'web/img/Proflie/68247db1d49d5.jpeg', 'Hi! Welcome to my profile. I love pets', 65),
(43, 'Royal Canin Veterinary Diet Feline GASTROINTESTINAL canned cat food', 'Specially formulated to assist in the management of gastrointestinal disease in cats requiring a higher energy density.\r\nHigh energy density\r\nSupports digestive health\r\nHelps reduce inflammation\r\nS/O® Index supports urinary health\r\nHigh energy density\r\nHigh energy density to help cats to more easily meet their energy needs\r\n\r\nSupports digestive health\r\nHighly digestible protein, prebiotics and zeolite for improved stool quality\r\n\r\nHelps reduce inflammation\r\nSupplemental omega-3 fatty acids (EPA and DHA) to reduce inflammation in the gastrointestinal tract', 699, '/web/img/market/68248de341bb8.webp', 'cat food', 4, '2025-05-14', 'Mike_dog', 'web/img/Proflie/68247db1d49d5.jpeg', 'Hi! Welcome to my profile. I love pets', 65),
(44, 'Gastrointestinal 3kg', 'Complete dietetic food for the nutritional management of dogs formulated to reduce acute intestinal absorption disorders, and promote nutritional restoration and convalescence. Highly digestible ingredients. Increased level of electrolytes and essential nutrients. High energy level.', 1600, '/web/img/market/68248e8d2de96.png', 'dog food', 3, '2025-05-14', 'Mike_dog', 'web/img/Proflie/68247db1d49d5.jpeg', 'Hi! Welcome to my profile. I love pets', 65),
(45, 'Royal Canin, Feline Care Nutrition Oral Care Adult 2.72kg', 'When introducing a new food or treat, it\'s best to allow your pet to adjust gradually. For new food, we recommend a 7-day transition. Begin with a 75:25 ratio of old to new food on Day 1 and Day 2, shifting to a 50:50 mix on Day 3 and Day 4, and a 25:75 balance on Day 5 and Day 6. By Day 7, your pet can fully enjoy their new food. For treats, remember to feed them sparingly — they should constitute no more than 10% of your pet\'s daily caloric intake. Monitor your pet for any unusual reactions when introducing a new treat. Treats are not a substitute for balanced, complete meals.', 2999, '/web/img/market/68248f16d689e.jpg', 'cat food', 4, '2025-05-14', 'Mike_dog', 'web/img/Proflie/68247db1d49d5.jpeg', 'Hi! Welcome to my profile. I love pets', 65);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `text` text COLLATE utf8mb4_general_ci NOT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `avatar_path` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `profile_description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `event_date` datetime NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `text`, `img_path`, `date`, `nickname`, `avatar_path`, `profile_description`, `type`, `event_date`, `location`) VALUES
(80, 59, 'About the Breed', 'The Golden Retriever, an exuberant Scottish gundog of great beauty, stands among America\'s most popular dog breeds. They are serious workers at hunting and field work, as guides for the blind, and in search-and-rescue, enjoy obedience and other competitive events, and have an endearing love of life when not at work. The Golden Retriever is a sturdy, muscular dog of medium size, famous for the dense, lustrous coat of gold that gives the breed its name. The broad head, with its friendly and intelligent eyes, short ears, and straight muzzle, is a breed hallmark. In motion, Goldens move with a smooth, powerful gait, and the feathery tail is carried, as breed fanciers say, with a \'merry action.\' The most complete records of the development of the Golden Retriever are included in the record books that were kept from 1835 until about 1890 by the gamekeepers at the Guisachan (pronounced Gooeesicun) estate of Lord Tweedmouth at Inverness-Shire, Scotland. These records were released to public notice in Country Life in 1952, when Lord Tweedmouth\'s great-nephew, the sixth Earl of Ilchester, historian and sportsman, published material that had been left by his ancestor. They provided factual confirmation to the stories that had been handed down through generations. Goldens are outgoing, trustworthy, and eager-to-please family dogs, and relatively easy to train. They take a joyous and playful approach to life and maintain this puppyish behavior into adulthood. These energetic, powerful gundogs enjoy outdoor play. For a breed built to retrieve waterfowl for hours on end, swimming and fetching are natural pastimes.', 'web/img/post/67cac19a72302.jpeg', '2025-03-07', 'mikedog', '', 'This is my profile', '', '0000-00-00 00:00:00', ''),
(81, 59, 'About Black Russian Terrier', 'The Black Russian Terrier is a large, immensely powerful worker of heavy bone and coarse all-black coat. BRTs are known for their courage, confidence, and intelligence. Bred to guard and protect, they are naturally aloof with strangers. What\'s the word we\'re looking for? Imposing? Massive? Majestic? How about just plain \'big.\' This brawny guard dog of the Siberian steppes can tip the scales at 140 pounds and stand as high as 30 inches at the shoulder. They\'re much taller when the huge, brick-shaped head is considered. The tousled, all-black coat is warm enough to allow BRTs to patrol some of the coldest habitable places on earth. The old expression \'He moves well for a big guy\' applies to this nimble-footed giant.', 'web/img/post/67cac68e332e0.jpg', '2025-03-07', 'mikedog', 'web/img/Proflie/67cac27e43969.jpeg', 'This is my profile', '', '0000-00-00 00:00:00', ''),
(82, 57, 'Persian cat', 'The docile Persian is a quiet feline who enjoys a calm and relaxing environment. Although she enjoys sitting in her humans’ laps and being pet, she’s just as happy to sit and observe everyone’s comings and goings from afar. Persians are independent and selective in who they show affection to.\r\n\r\nTemperament \r\nThey enjoy playful activities but are also content to drape themselves over an armchair rather than attempting to climb atop a bookcase. Persian kitties do well with mild-mannered children and laid-back dogs.\r\n\r\nCharacteristics\r\nThe Persian kitty has some distinct features, including a round head with a short face and snub nose. She also has chubby cheeks, big, round eyes and small, rounded ears. Persians have short, strong legs to support their sturdy bodies.\r\n\r\nLifespan\r\n15 to 20 years\r\n\r\nColors\r\nThe original Persian Cat had shiny, gray fur. Due to selective breeding, however, they now boast an array of different colors. In fact, there are 7 different coat color divisions total for competition purposes.\r\n\r\nThese range from silver and gold to white, smoky and solid-colored. Their eye color corresponds to their coat color. For example, white Persians tend to have deep blue or copper eyes, whereas silver or golden Persians have green eyes and solid-colored cats have copper eyes.\r\n\r\nShedding\r\nAlthough they can shed a lot, proper grooming will prevent your Persian kitty from leaving hair all over your home. Comb her hair daily to prevent tangles and matting and to remove loose hair. Bathing once per month (after a thorough combing) will keep her coat and skin healthy and dirt free.\r\n\r\nHealth\r\nThe Persian’s facial structure can predispose her to a number of potential health complications, including:', 'web/img/post/67cac766899cc.jpg', '2025-03-07', 'tali_dog', 'web/img/Proflie/65ae01ecb48e0.jpeg', 'This is my profile', '', '0000-00-00 00:00:00', ''),
(83, 59, 'International Dog Show “Tallinn Winner 2025”', 'At the International Dog Show “Tallinn Winner 2025” the titles “Tallinn Junior Winner 2025”, “Tallinn Winner 2025” and “Tallinn Veteran Winner 2025” will be awarded. Website: https://kennelliit.ee/en/sundmus/international-dog-show-tallinn-winner-2025/', 'web/img/post/67cad512ebbcf.jpg', '2025-03-07', 'mikedog', 'web/img/Proflie/67cac27e43969.jpeg', 'This is my profile', 'event', '2025-03-16 19:14:38', 'Tallinn, Estonia'),
(84, 57, 'Siberian Husky about the breed', 'Siberian Husky, a thickly coated, compact sled dog of medium size and great endurance, was developed to work in packs, pulling light loads at moderate speeds over vast frozen expanses. Sibes are friendly, fastidious, and dignified. The graceful, medium-sized Siberian Husky\'s almond-shaped eyes can be either brown or blue\'and sometimes one of each\'and convey a keen but amiable and even mischievous expression. Quick and nimble-footed, Siberians are known for their powerful but seemingly effortless gait. Tipping the scales at no more than 60 pounds, they are noticeably smaller and lighter than their burly cousin, the Alaskan Malamute. As born pack dogs, they enjoy family life and get on well with other dogs. The Sibe\'s innate friendliness render them indifferent watchdogs. These are energetic dogs who can\'t resist chasing small animals, so secure running room is a must. An attractive feature of the breed: Sibes are naturally clean, with little doggy odor.', 'web/img/post/67cd23fb28ae1.webp', '2025-03-09', 'tali_dog', 'web/img/Proflie/65ae01ecb48e0.jpeg', 'This is my profile', '', '0000-00-00 00:00:00', ''),
(85, 60, 'About turtle', 'turtle, (order Testudines), any reptile with a body encased in a bony shell, including tortoises. Although numerous animals, from invertebrates to mammals, have evolved shells, none has an architecture like that of turtles. The turtle shell has a top (carapace) and a bottom (plastron). The carapace and plastron are bony structures that usually join one another along each side of the body, creating a rigid skeletal box. This box, composed of bone and cartilage, is retained throughout the turtle’s life. Because the shell is an integral part of the body, the turtle cannot exit it, nor is the shell shed like the skin of some other reptiles.\r\n\r\nThere are approximately 356 species of turtles living on land in all continents except Antarctica and in both salt water and fresh water. Tortoises (family Testudinidae) live exclusively on land and have anatomic features distinguishing them from other turtles, but the term tortoise has long been used to refer to other terrestrial testudines as well, such as the box turtle and the wood turtle. Similarly, terrapin was sometimes used to describe any aquatic turtle but is now largely restricted to the edible diamondback terrapin (Malaclemys terrapin) of the eastern United States.', 'web/img/post/67cd25b4006b0.jpg', '2025-03-09', 'Emily_turtle', 'web/img/Proflie/67cd257e6ab43.jpeg', 'Turtle lover', '', '0000-00-00 00:00:00', ''),
(86, 57, 'British Shorthair about', 'Devotees of this robust, powerful breed often liken it to a teddy bear. Cuddly and comforting, the calm presence of a British Shorthair in the home means a welcoming “smile” for visitors and loyal, affectionate companionship for everyone in the house—mice, of course, excepted! This cat’s short, dense coat contains more hairs per square inch than any other breed, making it luxuriously rich to the touch yet easy to care for. With their sturdy, muscular builds, they are most comfortable keeping all four feet on the floor, so are highly unlikely to invade kitchen counters or endanger your good china.\r\n\r\nConsidered the modern embodiment of ancient Roman cats, British Shorthairs first came into the public eye at turn-of-the century cat shows in London’s Crystal Palace. Both World Wars wreaked havoc on the gene pool and necessitated some cross-breeding to both Persians and “moggies” (random-bred domestic shorthairs) in order to maintain and then improve the type. By the 1950s, British breeders’ efforts had become so successful that a blue male named Brynbuboo Little Monarch was the very first Grand Champion of any breed in the U.K.’s Governing Council of the Cat Fancy. Monarch was such a popular stud that most Brits today trace their ancestry back to him. First exported to the U.S. in the early 1900s, these cats were initially registered as “British Blues,” but are now seen in many colors, including other solids, bicolors, and tabbies.', 'web/img/post/67cd26c1c9301.jpg', '2025-03-09', 'tali_dog', 'web/img/Proflie/65ae01ecb48e0.jpeg', 'This is my profile', '', '0000-00-00 00:00:00', ''),
(87, 57, 'Maine Coon about', 'The Maine Coon is a massive cat with a powerful muscular athletic body in keeping with their impressive size. They have large, pointed ears held wide and tall and an intelligent expression.  \r\n\r\nThe coat is long and thick and consists of an undercoat covered by a substantial glossy, waterproof top coat and have attractive tufts on ears and paws. Their tails are spectacular and should be at least as long as their body so they can wrap it around their body for extra insulation. ', 'web/img/post/67cd277e7cf80.webp', '2025-03-09', 'tali_dog', 'web/img/Proflie/65ae01ecb48e0.jpeg', 'This is my profile', '', '0000-00-00 00:00:00', ''),
(88, 57, 'German Shepherd about', 'Generally considered dogkind\'s finest all-purpose worker, the German Shepherd Dog is a large, agile, muscular dog of noble character and high intelligence. Loyal, confident, courageous, and steady, the German Shepherd is truly a dog lover\'s delight. German Shepherd Dogs can stand as high as 26 inches at the shoulder and, when viewed in outline, presents a picture of smooth, graceful curves rather than angles. The natural gait is a free-and-easy trot, but they can turn it up a notch or two and reach great speeds. There are many reasons why German Shepherds stand in the front rank of canine royalty, but experts say their defining attribute is character: loyalty, courage, confidence, the ability to learn commands for many tasks, and the willingness to put their life on the line in defense of loved ones. German Shepherds will be gentle family pets and steadfast guardians, but, the breed standard says, there\'s a \'certain aloofness that does not lend itself to immediate and indiscriminate friendships.\'', 'web/img/post/67cd27d4d3be6.webp', '2025-03-09', 'tali_dog', 'web/img/Proflie/65ae01ecb48e0.jpeg', 'This is my profile', '', '0000-00-00 00:00:00', ''),
(89, 57, 'Bulldog about', 'Kind but courageous, friendly but dignified, the Bulldog is a thick-set, low-slung, well-muscled bruiser whose \'sourmug\' face is the universal symbol of courage and tenacity. These docile, loyal companions adapt well to town or country. \r\n\r\nYou can\'t mistake a Bulldog for any other breed. The loose skin of the head, furrowed brow, pushed-in nose, small ears, undershot jaw with hanging chops on either side, and the distinctive rolling gait all practically scream \'I\'m a Bulldog!\' The coat, seen in a variety of colors and patterns, is short, smooth, and glossy. Bulldogs can weigh up to 50 pounds, but that won\'t stop them from curling up in your lap, or at least trying to. But don\'t mistake their easygoing ways for laziness\'Bulldogs enjoy brisk walks and need regular moderate exercise, along with a careful diet, to stay trim. Summer afternoons are best spent in an air-conditioned room as a Bulldog\'s short snout can cause labored breathing in hot and humid weather.', 'web/img/post/67cd283849925.jpg', '2025-03-09', 'tali_dog', 'web/img/Proflie/65ae01ecb48e0.jpeg', 'This is my profile', '', '0000-00-00 00:00:00', ''),
(90, 57, 'Labrador Retriever about', 'The sweet-faced, lovable Labrador Retriever is one of America\'s most popular dog breeds, year after year. Labs are friendly, outgoing, and high-spirited companions who have more than enough affection to go around for a family looking for a medium-to-large dog.\r\n\r\nThe sturdy, well-balanced Labrador Retriever can, depending on the sex, stand from 21.5 to 24.5 inches at the shoulder and weigh between 55 to 80 pounds. The dense, hard coat comes in yellow, black, and a luscious chocolate. The head is wide, the eyes glimmer with kindliness, and the thick, tapering \'otter tail\' seems to be forever signaling the breed\'s innate eagerness. Labs are famously friendly. They are companionable housemates who bond with the whole family, and they socialize well with neighbor dogs and humans alike. But don\'t mistake his easygoing personality for low energy: The Lab is an enthusiastic athlete that requires lots of exercise, like swimming and marathon games of fetch, to keep physically and mentally fit.', 'web/img/post/67cd28e66329f.webp', '2025-03-09', 'tali_dog', 'web/img/Proflie/65ae01ecb48e0.jpeg', 'This is my profile', '', '0000-00-00 00:00:00', ''),
(91, 57, 'Beagle about', 'Not only is the Beagle an excellent hunting dog and loyal companion, it is also happy-go-lucky, funny, and\'thanks to its pleading expression\'cute. They were bred to hunt in packs, so they enjoy company and are generally easygoing. There are two Beagle varieties: those standing under 13 inches at the shoulder, and those between 13 and 15 inches. Both varieties are sturdy, solid, and \'big for their inches,\' as dog folks say. They come in such pleasing colors as lemon, red and white, and tricolor. The Beagle\'s fortune is in his adorable face, with its big brown or hazel eyes set off by long, houndy ears set low on a broad head. A breed described as \'merry\' by its fanciers, Beagles are loving and lovable, happy, and companionable\'all qualities that make them excellent family dogs. No wonder that for years the Beagle has been the most popular hound dog among American pet owners. These are curious, clever, and energetic hounds who require plenty of playtime.', 'web/img/post/67cd2923e43fb.webp', '2025-03-09', 'tali_dog', 'web/img/Proflie/65ae01ecb48e0.jpeg', 'This is my profile', '', '0000-00-00 00:00:00', ''),
(92, 57, 'Poodle about', 'Whether Standard, Miniature, or Toy, and either black, white, or apricot, the Poodle stands proudly among dogdom\'s true aristocrats. Beneath the curly, low-allergen coat is an elegant athlete and companion for all reasons and seasons.\r\n\r\nPoodles come in three size varieties: Standards should be more than 15 inches tall at the shoulder; Miniatures are 15 inches or under; Toys stand no more than 10 inches. All three varieties have the same build and proportions. At dog shows, Poodles are usually seen in the elaborate Continental clip. Most pet owners prefer the simpler Sporting clip, in which the coat is shorn to follow the outline of the squarely built, smoothly muscled body.  Forget any preconceived notions about Poodles you may have: Poodles are eager, athletic, and wickedly smart dogs of remarkable versatility. The Standard, with his greater size and strength, is the best all-around athlete of the family, but all Poodles can be trained with great success.', 'web/img/post/67cd2a0b0b417.webp', '2025-03-09', 'tali_dog', 'web/img/Proflie/65ae01ecb48e0.jpeg', 'This is my profile', '', '0000-00-00 00:00:00', ''),
(93, 57, 'Afghan Hound about', 'Among the most eye-catching of all dog breeds, the Afghan Hound is an aloof and dignified aristocrat of sublime beauty. Despite his regal appearance, the Afghan can exhibit an endearing streak of silliness and a profound loyalty.\r\n\r\nSince ancient times, Afghan Hounds have been famous for their elegant beauty. But the thick, silky, flowing coat that is the breed\'s crowning glory isn\'t just for show \' it served as protection from the harsh climate in mountainous regions where Afghans originally earned their keep. Beneath the Afghan\'s glamorous exterior is a powerful, agile hound \' standing as high as 27 inches at the shoulder \' built for a long day\'s hunt. Their huge paw-pads acted as shock absorbers on their homeland\'s punishing terrain.  The Afghan Hound is a special breed for special people. A breed expert writes, \'It\'s not the breed for all would-be dog owners, but where the dog and owner combination is right, no animal can equal the Afghan Hound as a pet.\'', 'web/img/post/67cd2a611e732.jpg', '2025-03-09', 'tali_dog', 'web/img/Proflie/65ae01ecb48e0.jpeg', 'This is my profile', '', '0000-00-00 00:00:00', ''),
(95, 60, 'A Beginner’s Guide to Keeping Turtles', 'With their stunning patterns, large eyes and little feet, plus their slow movements, lovable personalities and incredible longevity, it’s easy to see why turtles make fascinating pets. But what’s the best way to care for them? We spoke with veterinary experts about every aspect of basic pet turtle care, from diet and habitat to what to do when they’re sick.\r\n\r\nMany pet turtles live a very long life. Some tortoises have lived to over 100 years old!\r\nTurtles have a good sense of hearing and are able to recognize their keepers.\r\nTurtles can see in color and prefer to eat colorful food items.\r\nTurtles in cold places can slow their heart and metabolism down during the winter. This decreases their need for oxygen, so they can spend the entire winter living beneath the ice of a pond.\r\nThe easiest way to tell the difference between a turtle and a tortoise is that turtles are water-dwelling creatures with webbed feet or flippers, and tortoises are land-dwelling creatures with more elephantlike feet. Most turtles are more omnivorous (feeding on both plant and animal sources), while generally all tortoises are herbivorous (eating plant sources only).\r\n\r\nA turtle’s habitat requirements vary depending on their species. Price Dickson, DVM, a veterinarian specializing in birds and reptiles at My Pet’s Animal Hospital in Lakeland, Florida, provides an overall guideline for slider turtles (e.g., species like red-eared slider turtles and yellow-bellied sliders), who get their name from the way they slide into the water to escape predators. She adds that most aquatic and semi-aquatic turtles also do well with these guidelines.\r\n\r\nThe type of bedding or substrate you choose to get for your pet turtle will depend on how you’d like to set up their tank.\r\n\r\n“The easiest is a large stone or gravel that is too large to fit in the turtle’s mouth,” Dr. Dickson says. Size matters here, because turtles may try to swallow their bedding, which can lead to medical problems. Using stones that your turtle literally can’t ingest eliminates that risk.', 'web/img/post/67cd2c11df388.jpg', '2025-03-09', 'Emily_turtle', 'web/img/Proflie/67cd257e6ab43.jpeg', 'Turtle lover', '', '0000-00-00 00:00:00', ''),
(97, 61, 'All British Shorthair tips you will ever need', 'British Shorthair kittens can be demanding. They are super active, so you will have to dedicate some time and patience to teach them proper manners and good behaviour. Your kitty will calm down once they go through their kittenhood and adolescence, but you can expect a bumpy ride in the beginning. It\'s a common opinion that humans establish stronger bonds with baby cats, which is not untrue, but it’s hardly a rule. If you decide that a kitten is too much for you, you can easily go for a mature cat. A grown British Shorthair can be a fantastic companion minus all the challenges that raising a kitten brings. Once you have decided whether you want a kitten or an adult, you should determine if you prefer a boy or a girl. Some people may advise getting a female British Shorthair to avoid potential aggression and destructiveness, but there is no need to worry about it with this breed. Male or female, British Shorthairs exhibit no aggressive or destructive tendencies, and they do OK when left alone. The only aspect where females get an extra point is health. Although a generally healthy breed, British Shorthair toms are prone to more hereditary diseases than queens (heart problems mainly). The only actual difference is in size because boys tend to grow bigger than girls. Still, gender shouldn\'t play a crucial role in this decision because all British Shorthairs are affectionate and loyal. When you welcome a cat into your home, you must make them feel comfortable and accepted. Your British Shorthair needs: Litter box—Nothing about a British Shorthair is small, so you need to get a large litter box. Ideally, the tray should be as wide as your grown British Shorthair is long and 50% longer than your cat. You should also preferably have two litter boxes for one cat in your home Food and water dishes—It would be best to opt for ceramic or stainless steel instead of plastic dishes. Cats can easily scratch or nick plastic, creating a convenient breeding ground for bacteria, viruses, and mould. As for water, a fountain may be a better option as most felines prefer running water. Hydration is crucial to avoid UTIs, kidney disease, bladder stones, and similar issues Bed—Although your kitty will probably nap wherever they want, you should still get a cosy bed for them. Go for something with washable covers—it should be big enough to accommodate a fully grown British Shorthair Cat carrier—When picking a suitable carrier, consider the weight and size it can support. A British Shorthair can weigh up to 8 kg and be up to 46 cm high and 64 cm long Scratching post—Cats must scratch to trim and file their nails and stretch their bodies. Scratching is also crucial for claw, joint, and muscle health. If they don\'t have a dedicated place to do it, they will find the next best thing, i.e. your furniture. You should get at least one scratching post, and a horizontal scratching mat is also a good idea', 'web/img/post/67cd2da943e07.jpg', '2025-03-09', 'Jakson_cat', 'web/img/Proflie/67cd2d4bef68d.jpeg', 'My vlog about cats', '', '0000-00-00 00:00:00', ''),
(98, 62, 'Best parrots to have as pets', 'Best pet parrot\r\nThe best parrot for you depends on how well your chosen bird fits in with your life style and home.\r\n\r\nParrots can be small enough to fit in a pocket, large enough to weigh over 2 kg.\r\n\r\nClick the links below to find out more about:\r\n\r\nBest first time parrot\r\nBudgerigars as pets\r\nCockatiels as pets\r\nAre African greys good pets?\r\nCockatoos as pets\r\nMacaws as pets\r\nConures as pets\r\nRingnecks and Alexandrines as pets\r\nKakariki as pets\r\nWhere to buy a parrot?\r\nParrot lifespans\r\n\r\nThe variation in parrot species can be compared to variation in dog species. A great Dane and a Pekinese are both classified as dogs; the ideal home for one wouldn’t suit the other. It is no different for parrots. Best first time parrot\r\nThe obvious choice is the budgerigar or the cockatiel. These are ideal if cost is a factor, as smaller birds require less money to acquire and set up.\r\n\r\nThat said any pet bird, who isn’t trained to step up out of the cage and go back into the cage won’t be an agreeable pet. If you don’t have time to interact with the parrot and allow out of cage time, then a parrot is not the best pet for you.\r\n\r\nThe best bird for you also depends on how much time you have to devote to the bird and how much your’re willing to learn about parrots in general, and your preferred species.\r\n\r\n\r\nBudgerigars as pets\r\nThese birds make a good first time pet, and many devoted parrot people will tell you that their first bird was a budgie (Melopsittacus undulatus).\r\n\r\nAlong with the canary, and the cockatiel, these three species have been domesticated for much longer than other species.\r\n\r\nBudgerigars were first bred in USA in the 1850’s. They are small birds weighing 30-40 grams, averaging 18 cm in length.\r\n\r\nThey are easy to find and inexpensive and do not need a large cage. Most budgies and canaries are still fed on bird seed rather than pellets and they can be picky eaters.\r\n\r\nMy daughter-in-law’s budgie, Pimby, won’t try a new food unless she eats it first in front of him.\r\n\r\nIn the wild budgerigars eat a variety of seeds (grass seeds), fruits, berries and vegetation. In captivity they are playful and curious and if tamed young, make delightful pets. They are neither destructive nor noisy.\r\n\r\nThey are not long lived and rarely reach two figures which can be tragic for child owners. Like their larger cousins the Australian Galahs, care needs to be taken that their fat intake is monitored; they can be prone to lipomas and tumours.\r\n\r\nA tame budgie will often talk as well as sing and their voice is high and piping. The lone bird will sing continually to her reflection in the cage mirror.\r\n\r\nOne view about parrots (which is also mine) is that all species do better with a companion either of the same or opposite sex or even a compatible species. To the owner who complains ‘then my parrot won’t be so affectionate to me, will he?’ I‘d answer that “the added enjoyment you’ll get of watching the birds interact with each other is adequate compensation”.', 'web/img/post/67cd2e9a45632.webp', '2025-03-09', 'Harry_bird', 'web/img/Proflie/67cd2e5e6acb9.jpeg', 'My vlog about birds', '', '0000-00-00 00:00:00', ''),
(99, 57, 'How To Care for an Alaskan Malamute', 'The Alaskan malamute is an affectionate, loyal, playful, and confident dog. They are easily recognizable by their well-furred bodies and the cap over their heads. Alaskan malamutes were originally bred as arctic sled dogs. They come from Siberia and were brought to the United States through the Bering Strait. \r\n\r\nTheir size is complemented by formidable bones that make the malamute a strong dog. They were first used to hunt seals, scare polar bears, and pull heavy loads. Alaskan malamutes are widely loved and adopted by many people as family pets. \r\n\r\nMalamutes are often confused with Siberian huskies. Although they look alike, these two breeds have different origins, physical traits, and temperaments. \r\n\r\nIf you’re looking for a big, loyal, and playful dog, the malamute might just be the pet of your dreams.  Caring for Alaskan Malamutes\r\nIt is not complicated to care for malamutes. Since they are not as playful as other breeds, they won’t put you through messy cleaning times. The following tips will help to keep your dog in their best condition.\r\n\r\nGrooming\r\n\r\nSince malamutes have thick coats and undercoats, they require plenty of grooming. This is especially true during their shedding season, which comes twice a year. You don’t have to worry about trimming them. Regular brushing will work well to remove dead hair. Don’t forget to brush their teeth daily with dog toothpaste. Their nails should be trimmed as necessary, which could be anywhere from one to two times every month. Check the ears weekly to ensure there’s no dirt and to be aware of possible infections early enough. Exercise\r\n\r\nMalamutes have a history of hard work and amazing endurance. As such, they remain highly active even in other climates and require lots of activity. Take your malamute for regular walks and allow them to play and run freely outside. If you’re into hiking, skiing, skateboarding, or biking, malamutes may be the ideal pet for you.', 'web/img/post/67cd2f2a7f76e.jpeg', '2025-03-09', 'tali_dog', 'web/img/Proflie/65ae01ecb48e0.jpeg', 'This is my profile', '', '0000-00-00 00:00:00', ''),
(100, 57, 'Is the Golden Retriever a Good Fit for You?', 'Choosing the right pet for your family can be a difficult decision. There are so many options to choose from, and you may be considering one of America’s most popular dog breeds. The Golden Retriever is a loyal, outgoing and energetic dog that’s easy to train and maintains their playful, puppyish demeanor into adulthood. A beloved and timeless breed, the Golden Retriever has appeared in iconic movies and TV shows like “Full House,” “The Parent Trap,” and the “Air Bud” movies. Here are some things to consider about the breed if you’re thinking of adding them to your family.\r\n\r\nThe Golden Retriever’s Temperament\r\nA member of the Sporting Group, the Golden Retriever is a joyful, loyal companion that loves outdoor play. Goldens are excellent work dogs, with service inherent to their nature. Their obedience and skill is displayed through hunting, fieldwork, search-and rescue-operations, and working as service animals. The intelligent, devoted breed brings the same zeal for life outside of work too.\r\n\r\nThe Golden Retriever’s friendly and affectionate temperament make them an excellent pet and companion. They love to please their owners, making them a highly adaptable, trainable breed. Golden Retriever Physical Traits and Grooming Needs\r\nThe Golden Retriever is an iconic dog, known for their glossy, golden coat that gives the breed its name. Their short ears, friendly and intelligent eyes, broad head, and straight muzzle are considered a breed hallmark. They’re muscular, medium-sized dogs typically weighing between 55–75 pounds. Females are on the lower end, males are on the higher end. Golden Retrievers are 23–24 inches tall, with a lifespan of 10–12 years.\r\n\r\nGolden Retrievers have a medium length double coat. They heavily shed their thick, double coat once or twice a year, and shed moderately on a regular basis. Typically, Goldens should be brushed once or twice a week. During periods of heavy shedding, owners may look to incorporate daily brushing. Goldens don’t drool excessively. How Much Training Does a Golden Retriever Need?\r\nGolden Retrievers are eager to please their owners, which makes them an easier breed to train. Like any breed, early socialization and puppy training are important to a dog’s development. Early exposure to different types of people, environments, and situations will allow your new puppy to seamlessly transition into a well-behaved adult.\r\n\r\nAn active household would be the best fit for a Golden Retriever. Daily exercise plays a key role in your Golden’s development and demeanor. Golden Retrievers that don’t get enough exercise are prone to misbehaving, so ensure they get enough activity. They’re excellent companions on long runs, hikes, or bike rides. Plus, they love to swim and play fetch.', 'web/img/post/67cd2fa393135.jpeg', '2025-03-09', 'tali_dog', 'web/img/Proflie/65ae01ecb48e0.jpeg', 'This is my profile', '', '0000-00-00 00:00:00', ''),
(101, 57, 'The 2025 Crufts dog show', 'Welcome to the world’s greatest dog show, where you’ll experience everything from agility and flyball to exciting shows and demonstrations. Discover dogs of all shapes and sizes, and celebrate the incredible bond we share with our four-legged friends.\r\n \r\n\r\nWe recommend buying your tickets in advance, but daily tickets can be purchased for the following prices from the box office, if available...\r\n\r\n£27 = Thursday & Friday\r\n£35 = Saturday\r\n£29 = Sunday ', 'web/img/post/67cd333b2a3cf.jpg', '2025-03-09', 'tali_dog', 'web/img/Proflie/65ae01ecb48e0.jpeg', 'This is my profile', 'event', '2025-03-07 14:20:51', 'London, UK'),
(103, 57, 'World Dog Show 2025', 'The Finnish Kennel Club is hosting the FCI World Dog Show in Helsinki in August 2025. We are looking forward to arranging an unforgettable event for dog lovers all over the world under ”the Helsinki brand” with our experienced show team.', 'web/img/post/6822dbfd3bc81.png', '2025-05-13', 'tali_dog', 'web/img/Proflie/65ae01ecb48e0.jpeg', 'This is my profile', 'event', '2025-08-08 18:00:00', 'Helsinki, Finland'),
(104, 57, 'The Cat Show Live 2025', 'Our 2024 show was incredible with over 3,000 cat enthusiasts coming together including rescues, breeders, speakers, pet businesses, vets, feline experts, charities and cat lovers like you. In 2025, we are expecting to double in size, with between 5-6 thousand people in attendance!', 'web/img/post/6822da63ef6b3.png', '2025-05-13', 'tali_dog', 'web/img/Proflie/65ae01ecb48e0.jpeg', 'This is my profile', 'event', '2025-09-13 14:00:00', 'NEC Birmingham, UK');

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE `type` (
  `id` int NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`id`, `type`) VALUES
(1, 'dog'),
(2, 'cat'),
(3, 'bird'),
(4, 'turtle');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_estonian_ci NOT NULL,
  `auth_key` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `errors` int NOT NULL,
  `code_email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `breed` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img_path` text NOT NULL,
  `date_created` date NOT NULL,
  `isblocked` tinyint(1) NOT NULL,
  `auth_key_hash` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `auth_key`, `errors`, `code_email`, `breed`, `color`, `description`, `img_path`, `date_created`, `isblocked`, `auth_key_hash`, `type`, `name`, `nickname`) VALUES
(1, 'ip557798@gmail.com', '$2y$10$g4Lpijf5/GZJNZFpLwzjzO3D7GM86p3rC7SQaLhZb9/hA9UNRyhBm', 'CtgpZlnlNfD7vzZ3ePRr', 0, '', 'golden retriver', 'gold', 'Hello! This is my profile', 'web/img/Proflie/67a72b69b5e23.jpeg', '2025-02-10', 0, '$2y$10$W8W2m48m.1XZXLrupwdtvezQl.CTZoqETzGDLn/1MIL.dBb1onsTW', 'dog', 'Tali', 'tali_dog'),
(37, 'jafjafjsj@gmail.com', '$2y$10$ozRrP91OYuveW0sg/pNzz.HgTDJOSIpKBxJGBwY2M32QBUdLcfeDu', 'yD0PsahJLNhkcdKk6ii7', 0, '', 'husky', 'White', 'I will publish some posts here', 'web/img/Proflie/659288af84a10.jpeg', '2025-02-12', 0, '$2y$10$Nty9GJy.Dn5wMwzCDgBPwuUu82wGszSHww0PuQKdzJ8hWdssnA8J2', 'dog', 'Mike', 'Mike_dog'),
(57, 'ip557799@gmail.com', '$2y$10$E6xr3VyrvxeHAbfGHuj4FO/dIcKQ8NdSuAX3sqgS.dDjZQIYQlcte', 'vdx0KFz1qtBKW9c9Oe9E', 0, '', 'golden retriver', 'Golden', 'This is my profile', 'web/img/Proflie/65ae01ecb48e0.jpeg', '2025-02-17', 0, '$2y$10$fOacD6YroXB.fN16lD1rre5MqK/5qNmOVhL6iwZAC2y8roVQW0Mkm', 'dog', 'Tali', 'tali_dog'),
(59, 'iliapevnev@sti.edu', '$2y$10$kISqtivl.ne4JOyUaEoMR.RftpzUcXv/AjczliMgvCGJIEk3wEAuK', 'PtqEit8z504TTqJ6S5bi', 0, '', 'golden retriver', 'Golden', 'This is my profile', 'web/img/Proflie/67cac27e43969.jpeg', '2025-03-07', 0, '$2y$10$Aj.NbXCapMbkDdvAliBYNOq57tOgFnY/0allu3a59VCuFYeb1Nh2W', 'dog', 'Mike', 'mikedog'),
(60, 'turtle_lover5798@gmail.com', '$2y$10$SPZs.bOnQ0klz9D8.lRLXORr958A3yEEhNDQ.EB3wDsadBH0348Yy', 'inwSmQpXO0VrAphssLuN', 0, '', 'no breed', 'Green', 'Turtle lover', 'web/img/Proflie/67cd257e6ab43.jpeg', '2025-03-09', 0, '$2y$10$tZQoC/DbKP8BnWLARw8vOu2wmprz1E76LFuykFqzQ5yGTptv/yS3q', 'turtle', 'Emily', 'Emily_turtle'),
(61, 'cats_lover5588@gmail.com', '$2y$10$oBdYPgtLtXNuZk1EELtoseTtvIfS9TUs.pPbf5ypWV8GzrXBdSKly', 'Iu3O0LqPe7GONVmYFDQw', 0, '', 'no breed', 'Orange', 'My vlog about cats', 'web/img/Proflie/67cd2d4bef68d.jpeg', '2025-03-09', 0, '$2y$10$.Rlx5Dex1k4p6vtOpSbAqevOfDzPZV1I6MB6T4gr/jC5CAOw1Tex6', 'cat', 'Jakson', 'Jakson_cat'),
(62, 'parrots_lover8899@gmail.com', '$2y$10$vardTpfmMO0wpkZ.nyd1Lur.Mf.ZhUgW8VITjY51rHWUGV4bpKy.y', 'gyfeRmTQdzEoIoywGyPH', 0, '', 'no breed', 'Red', 'My vlog about birds', 'web/img/Proflie/67cd2e5e6acb9.jpeg', '2025-03-09', 0, '$2y$10$/9fBnUjPszt3LLzWsI5lDOO/m463IKdgYSCkR1T.cpkKLkUa6Zvdu', 'bird', 'Harry', 'Harry_bird'),
(63, 'EspinuevaJm@gmail.com', '$2y$10$tlYKVHZlGeHocdlaEVvXmOuh74gdwI/fW2Ym4wqLMTOaZ5iG.wQZ.', 'PICHnqnXl7lhXuEzjT3N', 0, '', 'no breed', 'black', 'small', '', '2025-04-29', 0, '$2y$10$YR9O7Thn6naGEkhfFOrnherZcrOrSP7wbWN0A4SHxRAeLnqJVWeAi', 'dog', 'makki', 'tooo'),
(64, 'Espinuevamakmak@gmail.com', '$2y$10$k5mUMI.hrBZ70wxciO7PjuJLYWaj9ReBqB7cvEYMn7LRcyhzWP3mi', 'FfNCG65oDGvvK6SJ56to', 0, '', 'no breed', 'Black', 'Big', '', '2025-04-30', 0, '$2y$10$lkDHvoqr19Lk0wMFKea9ieWU7WKlrq74dDDvUus3wmatp1ruCdH5u', 'dog', 'Loffy', 'Lof'),
(65, 'petlover@gmail.com', '$2y$10$pN1QEMXzGEVYQ/yrSjfyyeytIYA2p94tiUYDnVZ1movNZuHnJTi2S', 'R8o2xZvFczQ2K4CYvnQx', 0, '', 'golden retriver', 'Gold', 'Hi! Welcome to my profile. I love pets', 'web/img/Proflie/68247db1d49d5.jpeg', '2025-05-14', 0, '$2y$10$SVN/fqnVuo.qnPMSe9Po/eZ5jAKBOjlP/x4rJW5/B0YKYVLCqHxZC', 'dog', 'Mike', 'Mike_dog');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `breed`
--
ALTER TABLE `breed`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `market`
--
ALTER TABLE `market`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `breed`
--
ALTER TABLE `breed`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `market`
--
ALTER TABLE `market`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
