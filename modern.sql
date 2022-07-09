-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 03:38 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `modern`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attributes_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `variants_creation_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `attributes_name`, `display_type`, `variants_creation_mode`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Color', 'color', 'instantly', NULL, '2021-10-21 06:46:04', '2021-10-21 06:46:04'),
(2, 'Duration', 'select', 'instantly', NULL, '2021-10-21 07:01:47', '2021-10-21 07:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `chk_drivers`
--

CREATE TABLE `chk_drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `driver_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `move_to_last` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `claim_models`
--

CREATE TABLE `claim_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `claiming_amount` int(11) DEFAULT NULL,
  `app_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gst` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `unique_id`, `role_id`, `firstname`, `lastname`, `email`, `password`, `phone`, `device_id`, `device_name`, `address`, `address2`, `state`, `zipcode`, `country`, `client_image`, `status`, `remember_token`, `created_at`, `updated_at`, `client_type`, `gst`) VALUES
(8, 'MHC000001', NULL, 'Demo', 'Client', 'democlient123@gmail.com', '$2y$10$4nr2AFaGfeCmDz05biiZWuZQ4Tcfvnuby1b.VsierItOHXi3ZQ5/a', '+659876543210', NULL, NULL, 'abc address', 'xyz street', 'state', '888888', 'test', 'images/clients/MHC000001.png', 1, NULL, '2021-10-27 08:02:06', '2021-10-27 08:02:06', 'individual', NULL),
(9, 'MHC000002', NULL, 'Client', '123', 'client123@gmail.com', '$2y$10$I6UGTIXsunfz2JRO4GY95OlCnzLqK9i4F3cuDj8MD3qRroV8DqO3C', '+6086867969', NULL, NULL, 'test address', 'test street', 'test state', '888888', 'test country', NULL, 1, NULL, '2021-10-27 08:05:58', '2021-10-27 08:05:58', 'company', '214h488314614');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `hex`, `created_at`, `updated_at`) VALUES
(1, 'Black', '1', NULL, NULL),
(2, 'Orange', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `country_code`, `created_at`, `updated_at`) VALUES
(595, 'Afghanistan', '93', NULL, NULL),
(596, 'Albania', '355', NULL, NULL),
(597, 'Algeria', '213', NULL, NULL),
(598, 'Andorra', '376', NULL, NULL),
(599, 'Angola', '244', NULL, NULL),
(600, 'Antarctica', '672', NULL, NULL),
(601, 'Argentina', '54', NULL, NULL),
(602, 'Armenia', '374', NULL, NULL),
(603, 'Australia', '61', NULL, NULL),
(604, 'Austria', '43', NULL, NULL),
(605, 'Azerbaijan', '994', NULL, NULL),
(606, 'Bahrain', '973', NULL, NULL),
(607, 'Bangladesh', '880', NULL, NULL),
(608, 'Belarus', '375', NULL, NULL),
(609, 'Belgium', '32', NULL, NULL),
(610, 'Belize', '501', NULL, NULL),
(611, 'Benin', '229', NULL, NULL),
(612, 'Bhutan', '975', NULL, NULL),
(613, 'Bolivia', '591', NULL, NULL),
(614, 'Bosnia and Herzegovina', '387', NULL, NULL),
(615, 'Botswana', '267', NULL, NULL),
(616, 'Brazil', '55', NULL, NULL),
(617, 'British Indian Ocean Territory', '246', NULL, NULL),
(618, 'Brunei', '673', NULL, NULL),
(619, 'Bulgaria', '359', NULL, NULL),
(620, 'Burkina Faso', '226', NULL, NULL),
(621, 'Burundi', '257', NULL, NULL),
(622, 'Cambodia', '855', NULL, NULL),
(623, 'Cameroon', '237', NULL, NULL),
(624, 'Canada', '1', NULL, NULL),
(625, 'Cape Verde', '238', NULL, NULL),
(626, 'Central African Republic', '236', NULL, NULL),
(627, 'Chad', '235', NULL, NULL),
(628, 'Chile', '56', NULL, NULL),
(629, 'China', '86', NULL, NULL),
(630, 'Christmas Island', '61', NULL, NULL),
(631, 'Cocos (Keeling) Islands', '61', NULL, NULL),
(632, 'Colombia', '57', NULL, NULL),
(633, 'Comoros', '269', NULL, NULL),
(634, 'Republic Of The Congo', '242', NULL, NULL),
(635, 'Democratic Republic Of The Congo', '243', NULL, NULL),
(636, 'Cuba', '53', NULL, NULL),
(637, 'Cyprus', '357', NULL, NULL),
(638, 'Czech Republic', '420', NULL, NULL),
(639, 'Denmark', '45', NULL, NULL),
(640, 'Djibouti', '253', NULL, NULL),
(641, 'East Timor', '670', NULL, NULL),
(642, 'Ecuador', '593', NULL, NULL),
(643, 'Egypt', '20', NULL, NULL),
(644, 'El Salvador', '503', NULL, NULL),
(645, 'Equatorial Guinea', '240', NULL, NULL),
(646, 'Eritrea', '291', NULL, NULL),
(647, 'Estonia', '372', NULL, NULL),
(648, 'Ethiopia', '251', NULL, NULL),
(649, 'Falkland Islands', '500', NULL, NULL),
(650, 'Faroe Islands', '298', NULL, NULL),
(651, 'Fiji Islands', '679', NULL, NULL),
(652, 'Finland', '358', NULL, NULL),
(653, 'France', '33', NULL, NULL),
(654, 'French Polynesia', '689', NULL, NULL),
(655, 'Gabon', '241', NULL, NULL),
(656, 'Gambia The', '220', NULL, NULL),
(657, 'Georgia', '995', NULL, NULL),
(658, 'Germany', '49', NULL, NULL),
(659, 'Ghana', '233', NULL, NULL),
(660, 'Gibraltar', '350', NULL, NULL),
(661, 'Greece', '30', NULL, NULL),
(662, 'Greenland', '299', NULL, NULL),
(663, 'Guatemala', '502', NULL, NULL),
(664, 'Guinea', '224', NULL, NULL),
(665, 'Guinea-Bissau', '245', NULL, NULL),
(666, 'Guyana', '592', NULL, NULL),
(667, 'Haiti', '509', NULL, NULL),
(668, 'Honduras', '504', NULL, NULL),
(669, 'Hong Kong S.A.R.', '852', NULL, NULL),
(670, 'Hungary', '36', NULL, NULL),
(671, 'Iceland', '354', NULL, NULL),
(672, 'India', '91', NULL, NULL),
(673, 'Indonesia', '62', NULL, NULL),
(674, 'Iran', '98', NULL, NULL),
(675, 'Iraq', '964', NULL, NULL),
(676, 'Ireland', '353', NULL, NULL),
(677, 'Israel', '972', NULL, NULL),
(678, 'Italy', '39', NULL, NULL),
(679, 'Japan', '81', NULL, NULL),
(680, 'Jordan', '962', NULL, NULL),
(681, 'Kazakhstan', '7', NULL, NULL),
(682, 'Kenya', '254', NULL, NULL),
(683, 'Kiribati', '686', NULL, NULL),
(684, 'Kuwait', '965', NULL, NULL),
(685, 'Kyrgyzstan', '996', NULL, NULL),
(686, 'Laos', '856', NULL, NULL),
(687, 'Latvia', '371', NULL, NULL),
(688, 'Lebanon', '961', NULL, NULL),
(689, 'Lesotho', '266', NULL, NULL),
(690, 'Liberia', '231', NULL, NULL),
(691, 'Libya', '218', NULL, NULL),
(692, 'Liechtenstein', '423', NULL, NULL),
(693, 'Lithuania', '370', NULL, NULL),
(694, 'Luxembourg', '352', NULL, NULL),
(695, 'Macau S.A.R.', '853', NULL, NULL),
(696, 'Macedonia', '389', NULL, NULL),
(697, 'Madagascar', '261', NULL, NULL),
(698, 'Malawi', '265', NULL, NULL),
(699, 'Malaysia', '60', NULL, NULL),
(700, 'Maldives', '960', NULL, NULL),
(701, 'Mali', '223', NULL, NULL),
(702, 'Malta', '356', NULL, NULL),
(703, 'Marshall Islands', '692', NULL, NULL),
(704, 'Mauritania', '222', NULL, NULL),
(705, 'Mauritius', '230', NULL, NULL),
(706, 'Mayotte', '262', NULL, NULL),
(707, 'Mexico', '52', NULL, NULL),
(708, 'Micronesia', '691', NULL, NULL),
(709, 'Moldova', '373', NULL, NULL),
(710, 'Monaco', '377', NULL, NULL),
(711, 'Mongolia', '976', NULL, NULL),
(712, 'Morocco', '212', NULL, NULL),
(713, 'Mozambique', '258', NULL, NULL),
(714, 'Myanmar', '95', NULL, NULL),
(715, 'Namibia', '264', NULL, NULL),
(716, 'Nauru', '674', NULL, NULL),
(717, 'Nepal', '977', NULL, NULL),
(718, 'Netherlands Antilles', '599', NULL, NULL),
(719, 'Netherlands The', '31', NULL, NULL),
(720, 'New Caledonia', '687', NULL, NULL),
(721, 'New Zealand', '64', NULL, NULL),
(722, 'Nicaragua', '505', NULL, NULL),
(723, 'Niger', '227', NULL, NULL),
(724, 'Nigeria', '234', NULL, NULL),
(725, 'Niue', '683', NULL, NULL),
(726, 'Norway', '47', NULL, NULL),
(727, 'Oman', '968', NULL, NULL),
(728, 'Pakistan', '92', NULL, NULL),
(729, 'Palau', '680', NULL, NULL),
(730, 'Panama', '507', NULL, NULL),
(731, 'Papua new Guinea', '675', NULL, NULL),
(732, 'Paraguay', '595', NULL, NULL),
(733, 'Peru', '51', NULL, NULL),
(734, 'Philippines', '63', NULL, NULL),
(735, 'Poland', '48', NULL, NULL),
(736, 'Portugal', '351', NULL, NULL),
(737, 'Qatar', '974', NULL, NULL),
(738, 'Reunion', '262', NULL, NULL),
(739, 'Romania', '40', NULL, NULL),
(740, 'Russia', '7', NULL, NULL),
(741, 'Rwanda', '250', NULL, NULL),
(742, 'Saint Helena', '290', NULL, NULL),
(743, 'Saint Pierre and Miquelon', '508', NULL, NULL),
(744, 'Samoa', '685', NULL, NULL),
(745, 'San Marino', '378', NULL, NULL),
(746, 'Sao Tome and Principe', '239', NULL, NULL),
(747, 'Saudi Arabia', '966', NULL, NULL),
(748, 'Senegal', '221', NULL, NULL),
(749, 'Serbia', '381', NULL, NULL),
(750, 'Seychelles', '248', NULL, NULL),
(751, 'Sierra Leone', '232', NULL, NULL),
(752, 'Singapore', '65', NULL, NULL),
(753, 'Slovakia', '421', NULL, NULL),
(754, 'Slovenia', '386', NULL, NULL),
(755, 'Solomon Islands', '677', NULL, NULL),
(756, 'Somalia', '252', NULL, NULL),
(757, 'South Africa', '27', NULL, NULL),
(758, 'South Sudan', '211', NULL, NULL),
(759, 'Spain', '34', NULL, NULL),
(760, 'Sri Lanka', '94', NULL, NULL),
(761, 'Sudan', '249', NULL, NULL),
(762, 'Svalbard And Jan Mayen Islands', '47', NULL, NULL),
(763, 'Swaziland', '268', NULL, NULL),
(764, 'Sweden', '46', NULL, NULL),
(765, 'Switzerland', '41', NULL, NULL),
(766, 'Syria', '963', NULL, NULL),
(767, 'Taiwan', '992', NULL, NULL),
(768, 'Tanzania', '255', NULL, NULL),
(769, 'Thailand', '66', NULL, NULL),
(770, 'Togo', '228', NULL, NULL),
(771, 'Tokelau', '690', NULL, NULL),
(772, 'Tonga', '676', NULL, NULL),
(773, 'Tunisia', '216', NULL, NULL),
(774, 'Turkey', '90', NULL, NULL),
(775, 'Turkmenistan', '993', NULL, NULL),
(776, 'Tuvalu', '688', NULL, NULL),
(777, 'Uganda', '256', NULL, NULL),
(778, 'Ukraine', '380', NULL, NULL),
(779, 'United Arab Emirates', '971', NULL, NULL),
(780, 'United Kingdom', '44', NULL, NULL),
(781, 'United States', '1', NULL, NULL),
(782, 'Uruguay', '598', NULL, NULL),
(783, 'Uzbekistan', '998', NULL, NULL),
(784, 'Vanuatu', '678', NULL, NULL),
(785, 'Venezuela', '58', NULL, NULL),
(786, 'Vietnam', '84', NULL, NULL),
(787, 'Wallis And Futuna Islands', '681', NULL, NULL),
(788, 'Western Sahara', '212', NULL, NULL),
(789, 'Yemen', '967', NULL, NULL),
(790, 'Yugoslavia', '38', NULL, NULL),
(791, 'Zambia', '260', NULL, NULL),
(792, 'Zimbabwe', '263', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `country_code`
--

CREATE TABLE `country_code` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country_code`
--

INSERT INTO `country_code` (`id`, `name`, `code`) VALUES
(1, 'Singapore', '65'),
(2, 'China', '86'),
(3, 'Malaysia', '60'),
(4, 'India', '91');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `salesperson` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_terms` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deliveryMethod` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gst_no` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `address`, `state`, `zipcode`, `country`, `gst`, `mobile`, `email`, `website`, `service_id`, `customer_image`, `status`, `created_at`, `updated_at`, `customer_type`, `unique_id`, `tags`, `salesperson`, `payment_terms`, `deliveryMethod`, `gst_no`) VALUES
(16, 'Demo User', 'test address', NULL, NULL, NULL, NULL, '+919800767654', 'demouser123@gmail.com', NULL, NULL, 'images/customers/MHC00006.png', '1', '2021-12-02 08:54:37', '2021-12-22 07:57:49', 'individual', 'MHC00006', '[\"2\",\"3\"]', NULL, NULL, NULL, NULL),
(19, 'Allen securities llc', 'Allentown', 'PA', NULL, 'United States', NULL, '9057463021', 'info@gmail.com', NULL, NULL, 'images/customers/MHC00009.jpg', '1', '2021-12-06 05:20:27', '2022-03-30 21:18:02', 'individual', 'MHC00009', 'null', NULL, '2 Months', 'method2', NULL),
(22, 'new customer', 'Raniganj, N.S.B road', 'West Bengal', '713320', 'India', NULL, '+919090987654', 'new123@gmail.com', 'www.newCustomer.com', NULL, NULL, '1', '2021-12-07 02:07:15', '2021-12-22 06:20:42', 'individual', 'MHC00010', 'null', 'MHE00002', NULL, 'method2', NULL),
(23, 'Test2', 'Allentown', 'IL', NULL, 'United States', NULL, '+8621312321313', 'indi123@gmail.com', NULL, NULL, NULL, '1', '2021-12-14 07:57:42', '2022-03-30 21:19:38', 'individual', 'MHC00011', 'null', NULL, NULL, NULL, NULL),
(24, 'Test A', 'xxx', NULL, NULL, NULL, NULL, '+918697808004', 'test@yopmail.com', NULL, NULL, NULL, '1', '2022-03-01 20:38:32', '2022-03-01 20:40:50', 'individual', 'MHC00012', 'null', 'MHE00002', '2 Months', 'method1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_contacts`
--

CREATE TABLE `customer_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_job_position` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_state` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_zipcode` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_country` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_notes` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_contacts`
--

INSERT INTO `customer_contacts` (`id`, `customer_id`, `contact_type`, `contact_name`, `contact_description`, `contact_email`, `contact_title`, `contact_address`, `contact_phone`, `contact_job_position`, `contact_state`, `contact_zipcode`, `contact_country`, `contact_mobile`, `contact_notes`, `contact_image`, `created_at`, `updated_at`) VALUES
(20, '22', 'contact', 'xyz customer', 'Contact 1', 'xyz@gmail.com', 'Mr.', NULL, '7456123980', 'sales person', NULL, NULL, NULL, '8554611746', NULL, NULL, '2021-12-07 02:07:15', '2021-12-22 06:20:42'),
(21, '22', 'delivery', 'xyz customer', 'Delivery Address 1', 'xyz@gmail.com', 'Mr.', 'durgapur', '746981230', NULL, 'west bengal', '713356', 'india', '9956413074', NULL, NULL, '2021-12-07 02:07:15', '2021-12-07 02:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `customer_management`
--

CREATE TABLE `customer_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_treatment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_zipcode` int(11) DEFAULT NULL,
  `customer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `delivery_address_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_management`
--

INSERT INTO `customer_management` (`id`, `name`, `email`, `mobile`, `image`, `gst_treatment`, `gst_no`, `billing_address`, `billing_state`, `billing_country`, `billing_zipcode`, `delivery_address`, `delivery_state`, `delivery_country`, `delivery_zipcode`, `customer_type`, `password`, `created_at`, `updated_at`, `phone`, `delivery_address_1`, `billing_address_1`, `website`) VALUES
(1, 'Naboneeta Dhar', 'nabo.dhar@gmail.com', 914567890986, NULL, NULL, NULL, 'Home', 'west bengal', 'India', '700005', 'Home', 'west bengal', 'India', 700005, 'individual', '$2y$10$TTenPDbDtmZRDMIUr.cA9ulYTrZq7n2t2bvCam7gnta2FQl/URddW', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'testindividual', 'testindividual@gmail.com', 657894564564, NULL, NULL, NULL, 'sfd', 'sdg', 'dsg', 'dsgd', 'ghdfl', 'gsddf', 'fdsg', 8421255, 'individual', '$2y$10$ApfO110jq7TDeD0TW2psB.awEiO.tQjekZOK4MN3b/hdeF16p/xAa', NULL, NULL, 656556564545, 'hlfd', 'g', 'https://ffdgjka.com');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_method`
--

CREATE TABLE `delivery_method` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `method_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_method`
--

INSERT INTO `delivery_method` (`id`, `method_type`, `created_at`, `updated_at`) VALUES
(1, 'method1', NULL, NULL),
(2, 'method2', NULL, NULL),
(3, 'method3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `manager`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Management', NULL, NULL, NULL, 1),
(2, 'Administration', NULL, NULL, NULL, 1),
(3, 'Sales', NULL, NULL, NULL, 1),
(4, 'Outdoor', NULL, NULL, NULL, 1),
(5, 'Finance', NULL, NULL, NULL, 1),
(6, 'Professional Services', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_accnt_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_work_distance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu_certificate_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field_of_study` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identification_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_id_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_id_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `ren_rate` int(11) DEFAULT NULL,
  `blood_grp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_con` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drug_allergy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driving_license` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `unique_id`, `emp_name`, `job_position`, `work_mobile`, `work_phone`, `work_email`, `department`, `manager`, `default_customer`, `emp_image`, `contact_address`, `contact_email`, `contact_phone`, `bank_accnt_no`, `home_work_distance`, `marital_status`, `edu_certificate_level`, `field_of_study`, `school`, `country`, `identification_no`, `passport_no`, `gender`, `dob`, `place_of_birth`, `country_of_birth`, `other_id_name`, `other_id_no`, `other_id_file`, `status`, `created_at`, `updated_at`, `order_id`, `ren_rate`, `blood_grp`, `medical_con`, `drug_allergy`, `vehicle_no`, `driving_license`, `expiry_date`) VALUES
(1, 'MHE00001', 'Sunny Redfern', '1', '6851230', '6321470', 'alok123@gmail.com', '3', NULL, 'null', 'images/employees/MHE00001.jpg', 'Tracy', 'sunny@gmail.com', '8765432', NULL, '10', 'Single', 'Graduate', 'B.Tech', 'Xyz school', 'United States', '784569145632', 'AL2017496530', 'Female', '2000-11-27', 'USA', 'USA', 'Adhar', '784139564300', 'images/employees/ids/MHE00001.jpg', '1', '2021-12-08 08:04:53', '2022-03-30 21:13:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'MHE00002', 'Demo employee', '8', '+657496851', '+8698563214', 'demoemp123@gmail.com', '3', '1', 'null', 'images/employees/MHE00002.jpg', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2021-12-10 01:32:03', '2021-12-10 01:32:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'MHE00003', 'Charles Twain', '5', '7456686', '', 'charles3@gmail.com', '5', NULL, 'null', 'images/employees/MHE00003.jpg', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2021-12-13 23:51:56', '2022-03-30 21:14:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'MHE00004', 'Brian Anderson', '7', '3340', '5631780', 'Brian@gmail.com', '3', NULL, '[\"22\"]', 'images/employees/MHE00004.png', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2021-12-22 05:28:07', '2022-03-30 21:16:15', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'MHE00005', 'Greg Robertson', '4', '7894684562', '9874561230', 'greg@gmail.com', '3', NULL, '[\"22\"]', 'images/employees/MHE00005.jpg', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2021-12-22 06:10:58', '2022-03-30 21:15:06', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'MHE00006', 'Test', NULL, '+911234567892', NULL, 'test123@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2022-02-26 15:19:10', '2022-02-26 15:19:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'MHE00007', 'Ajay', '9', '+915676545678', '+914567856456', 'test@gmail.com', '4', NULL, 'null', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2022-05-09 14:59:07', '2022-05-09 14:59:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave_models`
--

CREATE TABLE `employee_leave_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `no_of_day` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `casual_leave` int(11) DEFAULT NULL,
  `sick_leave` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_logins`
--

CREATE TABLE `employee_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `login_date` datetime(3) DEFAULT NULL,
  `logout_date` datetime(3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_logins`
--

INSERT INTO `employee_logins` (`id`, `emp_id`, `login_date`, `logout_date`, `created_at`, `updated_at`) VALUES
(1, 8, '2022-06-27 10:00:00.000', '2022-06-27 19:00:00.000', NULL, NULL),
(2, 9, '2022-06-27 10:00:00.000', '2022-06-27 19:00:00.000', NULL, NULL),
(3, 10, '2022-06-27 10:00:00.000', '2022-06-27 19:00:00.000', NULL, NULL),
(4, 9, '2022-06-27 10:00:00.000', '2022-06-27 19:00:00.000', NULL, NULL),
(5, 8, '2022-06-27 10:00:00.000', '2022-06-27 19:00:00.000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_salaries`
--

CREATE TABLE `employee_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `basic_pay` int(11) DEFAULT NULL,
  `cpf` int(11) DEFAULT NULL,
  `medical_leave` int(11) DEFAULT NULL,
  `earning` int(11) DEFAULT NULL,
  `deduction` int(11) DEFAULT NULL,
  `designation` int(11) DEFAULT NULL,
  `commission` int(11) DEFAULT NULL,
  `insurance` int(11) DEFAULT NULL,
  `medical_allowance` int(11) DEFAULT NULL,
  `net_pay` int(11) DEFAULT NULL,
  `per_trip_charge` int(11) DEFAULT NULL,
  `no_trip` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_mode` int(11) DEFAULT NULL,
  `expense_amount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fleet_orders`
--

CREATE TABLE `fleet_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_time` time DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `pickup_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gst`
--

CREATE TABLE `gst` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gst_treatment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gst`
--

INSERT INTO `gst` (`id`, `gst_treatment`, `created_at`, `updated_at`) VALUES
(1, 'Registered Business', NULL, NULL),
(2, 'Unregistered Business', NULL, NULL),
(3, 'Consumer', NULL, NULL),
(4, 'Overseas', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `holiday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_price_breakups`
--

CREATE TABLE `invoice_price_breakups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `breakup_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breakup_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_paid` tinyint(4) NOT NULL,
  `due_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_price_breakups`
--

INSERT INTO `invoice_price_breakups` (`id`, `invoice_id`, `breakup_type`, `breakup_amount`, `is_paid`, `due_date`, `pay_date`, `created_at`, `updated_at`) VALUES
(1, 'MHI000002', 'Downpayment', '80', 1, NULL, NULL, '2022-01-04 08:05:25', '2022-01-04 08:05:25'),
(2, 'MHI000002', 'Remaining', '128', 1, NULL, NULL, '2022-01-04 08:05:25', '2022-01-06 05:28:16'),
(3, 'MHI000004', 'Downpayment', '100', 0, NULL, NULL, '2022-01-04 08:06:11', '2022-01-04 08:06:11'),
(4, 'MHI000004', 'Remaining', '270.8', 0, NULL, NULL, '2022-01-04 08:06:11', '2022-01-04 08:06:11'),
(5, 'MHI000003', 'Amount', '1575', 0, NULL, NULL, '2022-01-04 08:11:17', '2022-01-04 08:11:17'),
(6, 'MHI000001', 'Installment 1', '510.00', 1, NULL, NULL, '2022-01-04 08:24:22', '2022-01-06 06:07:13'),
(7, 'MHI000001', 'Installment 2', '510.00', 0, NULL, NULL, '2022-01-04 08:24:22', '2022-01-06 06:10:27'),
(8, 'MHI000001', 'Installment 3', '510.00', 1, NULL, NULL, '2022-01-04 08:24:22', '2022-01-06 07:15:24'),
(9, 'MHI000001', 'Installment 4', '510.00', 1, NULL, NULL, '2022-01-04 08:24:22', '2022-01-06 07:19:52');

-- --------------------------------------------------------

--
-- Table structure for table `job_positions`
--

CREATE TABLE `job_positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dpt_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_positions`
--

INSERT INTO `job_positions` (`id`, `position_name`, `position_description`, `manager`, `created_at`, `updated_at`, `dpt_id`, `status`) VALUES
(1, 'Driver', NULL, NULL, NULL, NULL, 4, 1),
(2, 'Accountant', NULL, NULL, NULL, NULL, 5, 1),
(3, 'Accounting officer', NULL, NULL, NULL, NULL, 5, 1),
(4, 'Business analyst', NULL, NULL, NULL, NULL, 5, 1),
(5, 'General accountant', NULL, NULL, NULL, NULL, 5, 1),
(6, 'Project accountant', NULL, NULL, NULL, NULL, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stage_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opportunity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `probability` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_closing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `stage_id`, `client_id`, `client_name`, `opportunity`, `email`, `mobile_no`, `expected_price`, `probability`, `priority`, `tag`, `expected_closing`, `created_at`, `updated_at`) VALUES
(12, '4', '19', 'Coffee shop', 'Coffee shop opportunity', 'addacafe@gmail.com', '+919057463021', '20000', '5', NULL, 'null', NULL, '2021-12-14 08:14:32', '2022-03-30 21:22:43'),
(13, '4', '22', 'new customer', 'new customer\'s opportunity', 'new123@gmail.com', '+919090987654', '5000', '5', NULL, '[\"3\"]', NULL, '2021-12-16 03:35:34', '2022-03-30 09:56:33'),
(14, '4', NULL, 'Sudipta', 'Test', 'sudipta09b@gmail.com', '8697808004', '1000', NULL, NULL, NULL, NULL, '2022-03-01 20:25:27', '2022-03-01 20:29:15'),
(15, '1', '16', 'Demo User', 'xyz', 'xyz@yopmail.com', '+919800767654', '500', NULL, NULL, NULL, NULL, '2022-03-01 20:37:06', '2022-03-01 20:37:06');

-- --------------------------------------------------------

--
-- Table structure for table `leavestructures`
--

CREATE TABLE `leavestructures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `casual_leave` int(11) DEFAULT NULL,
  `sick_leave` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logistic_dashboards`
--

CREATE TABLE `logistic_dashboards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logistic_dashboards`
--

INSERT INTO `logistic_dashboards` (`id`, `driver_id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 'MHE00004', '2022-01-18T1:00', '2022-01-18T02:00', '2022-01-18 05:09:16', '2022-01-18 05:09:16'),
(2, 'MHE00005', '2022-01-19T12:00', '2022-01-19T14:00', '2022-01-18 23:40:58', '2022-01-18 23:40:58'),
(3, 'MHE00005', '2022-01-19T12:33', '2022-01-19T14:35', '2022-01-19 01:33:48', '2022-01-19 01:33:48'),
(4, 'MHE00004', '2022-01-16T15:23', '2022-01-16T17:23', '2022-01-19 04:24:03', '2022-01-19 04:24:03'),
(5, 'MHE00004', '2022-01-10T12:00', '2022-01-10T14:00', '2022-01-19 04:24:55', '2022-01-19 04:24:55'),
(6, 'MHE00004', '2022-01-12T15:26', '2022-01-12T18:26', '2022-01-19 04:26:35', '2022-01-19 04:26:35'),
(7, 'MHE00004', '2022-01-11T16:18', '2022-01-11T18:18', '2022-01-19 05:18:11', '2022-01-19 05:18:11'),
(8, 'MHE00004', '2022-01-06T10:09', '2022-01-06T12:09', '2022-01-19 23:10:02', '2022-01-19 23:10:02'),
(9, 'MHE00005', '2022-01-20T18:10', '2022-01-20T20:10', '2022-01-20 07:23:35', '2022-01-20 07:23:35'),
(10, 'MHE00004', '2022-01-27T18:44', '2022-01-27T20:44', '2022-01-20 07:44:58', '2022-01-20 07:44:58'),
(11, 'MHE00004', '2022-01-27T21:45', '2022-01-27T22:45', '2022-01-20 07:45:24', '2022-01-20 07:45:24'),
(12, 'MHE00004', '2022-01-08T11:31', '2022-01-08T01:31', '2022-01-21 00:31:55', '2022-01-21 00:31:55'),
(13, 'MHE00004', '2022-01-21T14:11', '2022-01-21T14:11', '2022-01-21 03:11:47', '2022-01-21 03:11:47'),
(14, 'MHE00004', '2022-01-23T15:52', '2022-01-23T15:53', '2022-01-22 15:23:05', '2022-01-22 15:23:05'),
(15, 'MHE00004', '2022-02-03T00:26', '2022-02-15T00:26', '2022-02-03 10:26:48', '2022-02-03 10:26:48'),
(16, 'MHE00004', '2022-02-09T17:57', '2022-02-10T17:57', '2022-02-03 17:27:09', '2022-02-03 17:27:09'),
(17, 'MHE00004', '2022-02-16T11:34', '2022-02-16T02:34', '2022-02-15 11:04:16', '2022-02-15 11:04:16'),
(18, 'MHE00004', '2022-02-16T11:34', '2022-02-16T02:34', '2022-02-15 11:04:16', '2022-02-15 11:04:16'),
(19, 'MHE00005', '2222-02-12T10:00', '2222-02-12T23:00', '2022-02-16 12:53:15', '2022-02-16 12:53:15'),
(20, 'MHE00005', '2022-02-26T16:05', '2022-02-26T16:30', '2022-02-26 15:35:31', '2022-02-26 15:35:31'),
(21, 'MHE00005', '2022-03-16T09:04', '2022-03-23T19:02', '2022-03-15 17:32:29', '2022-03-15 17:32:29');

-- --------------------------------------------------------

--
-- Table structure for table `logistic_leads`
--

CREATE TABLE `logistic_leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stage_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_client` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pickup_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_add_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_add_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_add_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_pin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_client` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL,
  `delivered_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_add_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_add_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_add_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_pin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logistic_leads`
--

INSERT INTO `logistic_leads` (`id`, `stage_id`, `unique_id`, `client_id`, `client_name`, `expected_date`, `pickup_client`, `pickup_from`, `pickup_add_1`, `pickup_add_2`, `pickup_add_3`, `pickup_pin`, `pickup_state`, `pickup_country`, `pickup_location`, `pickup_email`, `pickup_phone`, `contact_name`, `contact_phone`, `delivery_client`, `delivered_to`, `delivery_add_1`, `delivery_add_2`, `delivery_add_3`, `delivery_pin`, `delivery_state`, `delivery_country`, `delivery_location`, `delivery_email`, `delivery_phone`, `created_at`, `updated_at`, `order_id`, `status`) VALUES
(5, '3', 'MHL000004', '22', 'new customer', '2021-12-31', 'Adda Cafe', NULL, 'Chittaranjan, 35 street', 'some address', 'add 3', '713320', 'West Bengal', 'India', 'near bus stop', 'addacafe@gmail.com', '+919057463021', 'xyz customer', '9956413074', 'Demo User', NULL, 'test address', 'whitefield, 23 street', NULL, '888001', 'Karnataka', 'India', 'bkxk location', 'demouser123@gmail.com', '+919800767654', '2021-12-17 05:09:05', '2022-01-22 15:23:02', NULL, NULL),
(6, '3', 'MHL000005', '19', 'Adda Cafe', '2021-12-27', 'Demo User', NULL, 'test address', NULL, NULL, '700016', 'West Bengal', 'India', 'near bus stop', 'demouser123@gmail.com', '+919800767654', 'demo contact', '9585618794', 'new customer', NULL, 'Raniganj, N.S.B road', NULL, NULL, '713320', 'West Bengal', 'India', 'xyz location', 'new123@gmail.com', '+919090987654', '2021-12-19 23:22:04', '2021-12-23 06:08:06', NULL, 4),
(7, '2', 'MHL000006', '16', 'Demo User', '2022-01-12', 'new customer', NULL, 'Raniganj, N.S.B road', NULL, NULL, '713320', 'West Bengal', 'India', NULL, 'new123@gmail.com', '+919090987654', 'demo contact', '9856413576', 'India', NULL, 'test address', NULL, NULL, '909876', 'jksnj', 'India', NULL, 'indi123@gmail.com', '+8621312321313', '2022-01-03 06:56:10', '2022-02-26 15:13:12', NULL, NULL),
(8, '1', 'MHL000007', '16', 'Demo User', '2022-01-28', 'India', NULL, 'jsh', 'sdsa', NULL, '713320', 'West Bengal', 'India', NULL, 'indi123@gmail.com', '+8621312321313', 'kishore', '9878745456', 'new customer', NULL, 'Raniganj, N.S.B road', NULL, NULL, '713320', 'West Bengal', 'India', NULL, 'new123@gmail.com', '+919090987654', '2022-01-04 02:17:27', '2022-01-04 02:17:27', NULL, NULL),
(9, '2', 'MHL000008', '19', 'Adda Cafe', '2022-01-31', 'Demo User', NULL, 'test address', NULL, NULL, '736444', 'West Bengal', 'India', NULL, 'demouser123@gmail.com', '+919800767654', 'shree', '9956413074', 'new customer', NULL, 'Raniganj, N.S.B road', NULL, NULL, '713320', 'West Bengal', 'India', NULL, 'new123@gmail.com', '+919090987654', '2022-01-04 06:03:52', '2022-01-04 06:05:51', NULL, NULL),
(10, '1', 'MHL000009', 'NULL', 'test', 'NULL', NULL, 'test', 'test', NULL, NULL, 'test', 'test', 'test', NULL, 'NULL', 'test', 'NULL', 'NULL', NULL, 'test', 'test', NULL, NULL, 'test', 'test', 'test', NULL, 'NULL', 'test', '2022-02-03 10:26:48', '2022-02-03 10:26:48', NULL, NULL),
(11, '1', 'MHL000010', 'NULL', 'Adda Cafe', 'NULL', NULL, NULL, 'test address', NULL, NULL, '700016', 'West Bengal', 'India', NULL, 'demouser123@gmail.com', '+919800767654', 'NULL', '9585618794', NULL, NULL, 'Raniganj, N.S.B road', NULL, NULL, '713320', 'West Bengal', 'India', NULL, 'new123@gmail.com', '+919090987654', '2022-02-03 17:27:09', '2022-02-03 17:27:09', NULL, NULL),
(12, '1', 'MHL000011', 'NULL', 'Apple', 'NULL', NULL, 'Apple', 'sample address', NULL, NULL, '457845', 'Delhi', 'India', NULL, 'admin@gmail.com', '8651254325', 'NULL', '8651254325', NULL, 'Apple', 'b ghb', NULL, NULL, '801503', 'Delhi', 'India', NULL, 'admin@gmail.com', '+918651254309', '2022-02-15 11:04:16', '2022-02-15 11:04:16', NULL, NULL),
(13, '1', 'MHL000012', 'NULL', 'Apple', 'NULL', NULL, 'Apple', 'sample address', NULL, NULL, '457845', 'Delhi', 'India', NULL, 'admin@gmail.com', '8651254325', 'NULL', '8651254325', NULL, 'Apple', 'b ghb', NULL, NULL, '801503', 'Delhi', 'India', NULL, 'admin@gmail.com', '+918651254309', '2022-02-15 11:04:16', '2022-02-15 11:04:16', NULL, NULL),
(14, '1', 'MHL000013', 'NULL', 'Test Pte. Ltd.', 'NULL', NULL, 'Tan', '1 Singapore way', NULL, NULL, '123456', 'SG', 'SG', NULL, 'xx@hgf.com', '123456', 'NULL', '123456', NULL, 'Ninjavan', '2 SG way', NULL, NULL, '123456', 'SG', 'SG', NULL, 'xx@hgf.com', '123456', '2022-02-16 12:53:15', '2022-02-16 12:53:15', NULL, NULL),
(15, '1', 'MHL000014', 'NULL', 'Ram', 'NULL', NULL, 'XYZ', 'Kolkata', NULL, NULL, '700055', 'wb', 'india', NULL, 'test@gmail.com', '1234567892', 'NULL', '1111111111', NULL, 'ABC', 'Garia', NULL, NULL, '700084', 'wb', 'india', NULL, 'test1@gmail.com', '122222222', '2022-02-26 15:35:31', '2022-02-26 15:35:31', NULL, NULL),
(16, '1', 'MHL000015', 'NULL', 'Zane Bowers', 'NULL', NULL, 'Commodo dicta aut et', 'Corrupti provident', NULL, NULL, 'Quo sint dolorem ani', 'Eaque qui nostrum la', 'Aut laboriosam sed', NULL, 'gimoqigymu@mailinator.com', '+1 (425) 179-7203', 'NULL', '+1 (864) 835-5977', NULL, 'Ut consectetur assu', 'Sed eum inventore qu', NULL, NULL, 'Mollitia quia minus', 'Anim nulla consequat', 'Ut lorem aut consequ', NULL, 'silabehufy@mailinator.com', '+1 (382) 499-1676', '2022-03-15 17:32:29', '2022-03-15 17:32:29', NULL, NULL),
(17, '1', 'MHL000016', '16', 'Demo User', '2022-06-29', 'dg', NULL, 'hdg', 'hdg', 'g', '856989', 'kolkat', 'hg', 'hgd', 'hgdhgddh@gmail.com', '565646', 'akash', '8523658965', 'hd', NULL, 'hgd', 'hg', 'hgd', '70091', 'howrah', 'hgf', 'hg', 'fgsadh@gmail.com', '6456654646', '2022-06-28 19:30:34', '2022-06-28 19:30:34', NULL, NULL),
(18, '1', 'MHL000017', '16', 'Demo User', '2022-06-29', 'gfgfdfs', NULL, '6546fdfsgf', 'ddfg', 'sdfgsdfdg', '70091', 'kolkata', 'gfdg', 'gf', 'dfgfdgddsg@gmail.com', '45', 'gdsf', '89866664564', 'gfsdffs', NULL, 'sdg', 'gfdf', 'gfdfd', '54554456', 'gfds', 'gdf', 'fd', 'fgfgasfsakdf@gmail.com', '65', '2022-06-28 19:31:50', '2022-06-28 19:31:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logistic_leads_drivers`
--

CREATE TABLE `logistic_leads_drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logistic_lead_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logistic_leads_drivers`
--

INSERT INTO `logistic_leads_drivers` (`id`, `driver_id`, `logistic_lead_id`, `created_at`, `updated_at`) VALUES
(3, 'MHE00004', '6', '2021-12-23 06:08:06', '2021-12-23 06:08:06'),
(4, 'MHE00004', '7', '2022-01-06 23:39:38', '2022-01-06 23:39:38'),
(5, 'MHE00004', '5', '2022-01-22 15:23:04', '2022-01-22 15:23:04'),
(6, 'MHE00004', '11', '2022-02-03 17:27:09', '2022-02-03 17:27:09'),
(7, 'MHE00004', '12', '2022-02-15 11:04:16', '2022-02-15 11:04:16'),
(8, 'MHE00004', '13', '2022-02-15 11:04:16', '2022-02-15 11:04:16'),
(9, 'MHE00005', '14', '2022-02-16 12:53:16', '2022-02-16 12:53:16'),
(10, 'MHE00005', '15', '2022-02-26 15:35:31', '2022-02-26 15:35:31'),
(11, 'MHE00005', '16', '2022-03-15 17:32:29', '2022-03-15 17:32:29');

-- --------------------------------------------------------

--
-- Table structure for table `logistic_leads_invoices`
--

CREATE TABLE `logistic_leads_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logistic_lead_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `down_payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quotation_reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logistic_leads_invoices`
--

INSERT INTO `logistic_leads_invoices` (`id`, `logistic_lead_id`, `unique_id`, `invoice_type`, `down_payment`, `quotation_reference`, `invoice_date`, `due_date`, `created_at`, `updated_at`) VALUES
(2, '5', 'MHI000001', 'down_payment_percentage', '25', 'MHLQ000003', '2022-01-03', '2022-01-03', '2022-01-03 00:51:20', '2022-01-04 08:24:22'),
(3, '6', 'MHI000002', 'down_payment_amount', '80', 'MHLQ000004', '2022-01-03', '2022-01-03', '2022-01-03 02:14:04', '2022-01-04 08:05:25'),
(5, '8', 'MHI000004', 'down_payment_amount', '100', 'MHLQ000006', '2022-01-04', '2022-01-04', '2022-01-04 02:20:08', '2022-01-04 08:06:11'),
(6, '7', 'MHI000005', 'down_payment_percentage', '50', NULL, '2022-01-07', '2022-01-07', '2022-01-07 00:02:51', '2022-01-07 00:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `logistic_leads_products`
--

CREATE TABLE `logistic_leads_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lead_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dimension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logistic_leads_products`
--

INSERT INTO `logistic_leads_products` (`id`, `lead_id`, `product_name`, `dimension`, `quantity`, `uom`, `area`, `weight`, `created_at`, `updated_at`) VALUES
(22, 'MHL000005', 'chair', '20x20x20', '5', 'unit', '400 sq ft', '20 kg', '2021-12-20 01:17:09', '2021-12-20 01:17:09'),
(23, 'MHL000004', 'Oranges', NULL, '16', 'unit', NULL, '10 kg', '2021-12-20 01:17:26', '2021-12-20 01:17:26'),
(24, 'MHL000004', 'Apples', '20X20', '5', 'unit', '10X10', '1kg', '2021-12-20 01:17:26', '2021-12-20 01:17:26'),
(25, 'MHL000006', 'geyser', '20X10', '10', 'pcs', '20X10X30', '200 kgs', '2022-01-03 06:56:10', '2022-01-03 06:56:10'),
(26, 'MHL000007', 'chair', '20X10', '10', 'pcs', '20X20X20', '200 kg', '2022-01-04 02:17:27', '2022-01-04 02:17:27'),
(27, 'MHL000008', 'glasses', '12x6', '1', 'unit', '20 sq ft', '2 kg', '2022-01-04 06:03:52', '2022-01-04 06:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `logistic_leads_quotations`
--

CREATE TABLE `logistic_leads_quotations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lead_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quotation_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_treatment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quotation_template` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_terms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logistic_leads_quotations`
--

INSERT INTO `logistic_leads_quotations` (`id`, `lead_id`, `quotation_id`, `sales_id`, `gst_treatment`, `quotation_template`, `expiration`, `payment_terms`, `terms_condition`, `product`, `description`, `quantity`, `unit_price`, `tax`, `total_price`, `created_at`, `updated_at`) VALUES
(4, '5', 'MHLQ000001', NULL, '1', NULL, NULL, 'Immediate Payment', NULL, 'testing', 'testing', '1', '350', '[1,3]', '350.28', '2021-12-19 23:18:39', '2021-12-19 23:18:39'),
(6, '5', 'MHLQ000003', NULL, '1', NULL, NULL, 'Immediate Payment', NULL, 'test service', 'for testing', '2', '1000', '[4]', '2040.00', '2021-12-27 12:42:31', '2021-12-27 12:42:31'),
(8, '6', 'MHLQ000004', NULL, '1', NULL, '2022-01-19', 'Immediate Payment', NULL, 'Delivery Service', 'To deliver a product', '1', '200', '[2]', '208.00', '2022-01-03 02:13:48', '2022-01-03 02:13:48'),
(9, '7', 'MHLQ000005', NULL, '1', NULL, '2022-01-05', 'Immediate Payment', NULL, 'Delivery Service', 'To deliver a product', '4', '375', '[1]', '1575.00', '2022-01-03 06:57:29', '2022-01-03 06:57:29'),
(10, '8', 'MHLQ000006', NULL, '1', NULL, '2022-01-20', 'Immediate Payment', NULL, 'Delivery Service', 'To deliver a product', '1', '360', '[3]', '370.80', '2022-01-04 02:18:38', '2022-01-04 02:18:38'),
(11, '8', 'MHLQ000007', NULL, '1', NULL, '2022-01-13', 'Immediate Payment', NULL, 'test service', 'for testing', '2', '200', '[2]', '416.00', '2022-01-04 02:19:02', '2022-01-04 02:19:02'),
(12, '8', 'MHLQ000008', NULL, '3', '1111', NULL, 'End of following Months', NULL, 'test service', 'for testing', '2', '100000.', '[]', '200000.00', '2022-01-24 18:17:11', '2022-01-24 18:17:11');

-- --------------------------------------------------------

--
-- Table structure for table `logistic_leads_salespersons`
--

CREATE TABLE `logistic_leads_salespersons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_person_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_person_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logistic_lead_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logistic_leads_salespersons`
--

INSERT INTO `logistic_leads_salespersons` (`id`, `sale_person_name`, `sale_person_id`, `logistic_lead_id`, `created_at`, `updated_at`) VALUES
(1, 'Demo employee', 'MHE00002', '6', '2021-12-20 05:05:57', '2021-12-20 05:05:57'),
(2, 'Demo employee', 'MHE00002', '9', '2022-01-04 06:05:51', '2022-01-04 06:05:51'),
(3, 'xyz', 'MHE00002', '7', '2022-02-26 15:13:12', '2022-02-26 15:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `logistic_stage`
--

CREATE TABLE `logistic_stage` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stage_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logistic_stage`
--

INSERT INTO `logistic_stage` (`id`, `stage_name`, `created_at`, `updated_at`) VALUES
(1, 'New', NULL, NULL),
(2, 'Assign SalesPerson', NULL, NULL),
(3, 'Assign Driver', NULL, NULL),
(4, 'Transit', NULL, NULL),
(5, 'Delivered', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `vehicle_no` int(11) DEFAULT NULL,
  `current_mileage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dealer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_performed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charges` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `date`, `vehicle_no`, `current_mileage`, `dealer`, `service_performed`, `invoice_no`, `charges`, `created_at`, `updated_at`) VALUES
(1, '2022-06-16', 8, '45', 'quwash', 'car washing', '123THR', 1000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_clients_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_08_134652_create_country_code_table', 1),
(6, '2021_09_16_065613_create_permission_tables', 1),
(7, '2021_09_28_192959_create_table_stage', 1),
(9, '2021_09_29_182342_create_table_products', 2),
(12, '2021_09_29_220933_create_table_leads', 3),
(13, '2021_10_01_015659_create_table_tags', 4),
(20, '2021_10_01_201417_create_gst_table', 6),
(21, '2021_10_02_022206_create_taxs_table', 6),
(23, '2021_10_03_191046_create_users_table', 7),
(24, '2021_10_04_131850_create_quotations_table', 8),
(25, '2021_10_04_132421_create_quotation_products_table', 9),
(26, '2021_10_21_093822_product_categories', 10),
(29, '2021_10_21_120705_attributes', 11),
(31, '2021_10_22_095048_uom_category', 12),
(32, '2021_10_22_120751_create_table_uom', 13),
(33, '2021_10_28_074811_create_logistic_stage_table', 14),
(34, '2021_10_29_054428_create_logistic_leads_table', 15),
(35, '2021_10_29_060315_create_logistic_leads_products_table', 16),
(36, '2021_11_01_095832_create_logistic_leads_quotatiosn_table', 17),
(37, '2021_11_30_091401_create_payment_terms_table', 18),
(38, '2021_11_30_100610_create_sales_person_table', 19),
(39, '2021_11_30_101905_create_delivery_method_table', 20),
(40, '2021_12_06_091738_create_employee_table', 21),
(42, '2021_12_09_075158_create_departments_table', 22),
(44, '2021_12_09_115555_create_table_job_positions', 23),
(45, '2021_12_20_100358_create_logistic_leads_salespersons_table', 24),
(46, '2021_12_22_072106_create_vehicles_table', 25),
(47, '2021_12_22_121724_create_logistic_leads_drivers_table', 26),
(48, '2021_12_23_052030_create_vehicle_brands_table', 27),
(49, '2021_12_23_052805_create_vehicle_models_table', 28),
(54, '2021_12_23_122425_create_colors_table', 29),
(55, '2021_12_24_072814_create_services_table', 30),
(56, '2021_12_27_110601_create_logistic_leads_invoices_table', 31),
(57, '2022_01_04_045936_create_invoice_price_breakups_table', 32),
(59, '2022_01_06_064126_create_payments_table', 33),
(60, '2022_01_18_101224_create_logistic_dashboards_table', 34),
(61, '2022_05_05_105207_create_customer_management', 34),
(62, '2022_05_07_072604_order_id_in_employee_table', 34),
(63, '2022_05_07_073640_check_drivers_table', 34),
(64, '2022_05_09_104032_create_orders_table', 35),
(65, '2022_05_09_132543_create_order_products_table', 35),
(66, '2022_05_10_050653_create_customer_id_in_orders_table', 35),
(67, '2022_05_10_095841_create_orser_statuses_table', 35),
(68, '2022_05_12_115712_create_extra_fields_to_logistic_leads', 35),
(69, '2022_05_16_095135_user_address', 35),
(70, '2022_05_17_063318_extra_fields_for_categories', 36),
(71, '2022_05_18_053429_create_size_table', 36),
(72, '2022_05_18_095446_create_units_table', 36),
(73, '2022_05_18_121307_create_extra_fields_to_products_table', 36),
(74, '2022_05_24_053856_create_user_image_column', 36),
(75, '2022_05_24_055712_create_countries_table', 36),
(76, '2022_05_24_063640_create_states_table', 36),
(77, '2022_05_26_064737_extra_fields_for_customer_management', 37),
(78, '2022_05_26_134405_create_permission_table', 37),
(79, '2022_05_27_122949_permission_colmn', 37),
(80, '2022_05_28_053509_create_subcategories_table', 37),
(81, '2022_05_30_115608_create_extra_fields_to_products', 37),
(82, '2022_05_31_102659_create_ware_houses_table', 37),
(83, '2022_06_02_115104_create_warehouse_products_table', 37),
(84, '2022_06_06_072810_status_fields_in_departments_table', 37),
(85, '2022_06_06_120528_create_extra_fields_to_job_positions', 37),
(86, '2022_06_07_110441_create_more_fields_to_employee_table', 37),
(87, '2022_06_10_105402_create_brand_status', 37),
(88, '2022_06_11_082133_create_status_fields', 37),
(89, '2022_06_13_105856_extra_fields_to_vehicle_table', 37),
(90, '2022_06_14_122829_create_maintenance_table', 37),
(91, '2022_06_15_123913_create_collection_table', 38),
(92, '2022_06_16_071528_extra_field_to_collection', 38),
(93, '2022_06_16_083431_change_field_to_collection', 38),
(94, '2022_06_16_083657_change_field_to_collection_driver', 38),
(95, '2022_06_18_074534_half_day_price', 38),
(96, '2022_06_20_072026_create_fleet_orders_table', 38),
(97, '2022_06_23_082021_create_pay_structures_table', 38),
(98, '2022_06_24_045812_create_employee_salaries_table', 38),
(99, '2022_06_25_051037_create_holidays_table', 38),
(100, '2022_06_25_092750_create_leavestructures_table', 38),
(101, '2022_06_27_065838_create_employee_logins_table', 38),
(102, '2022_06_27_123633_create_employee_leave_models_table', 38),
(103, '2022_06_28_055720_create_claim_models_table', 38),
(104, '2022_06_28_122650_extra_fields_to_employee_leave_models', 38),
(105, '2022_06_29_124204_extra_fields_to_order_products_table', 38),
(106, '2022_07_02_072005_create_expenses_table', 38),
(107, '2022_07_08_065939_extra_fields_to_products_table', 39);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_zipcode` int(11) DEFAULT NULL,
  `customer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `customer_name`, `customer_email`, `customer_phone`, `billing_address`, `billing_state`, `billing_country`, `billing_zipcode`, `delivery_address`, `delivery_state`, `delivery_country`, `delivery_zipcode`, `customer_type`, `order_status`, `order_mode`, `order_amount`, `delivery_status`, `driver_id`, `created_at`, `updated_at`, `customer_id`) VALUES
(1, '1', 'Bijay Kumar', 'kumar@gmail.com', '1994687449', NULL, NULL, NULL, NULL, 'behala,kolkata', 'west bengal', 'india', 745896, 'individual', '1', 'COD', '550', NULL, NULL, '2022-05-09 22:39:51', NULL, NULL),
(2, '2', 'Ritesh Tewari', 'tewari@gmail.com', '1994687453', NULL, NULL, NULL, NULL, 'shyambazar,kolkata', 'west bengal', 'india', 745856, 'individual', '1', 'COD', '100', NULL, NULL, '2022-05-10 20:39:51', NULL, NULL),
(3, '3', 'Mukesh Sahani', 'mukesh@gmail.com', '1994687448', NULL, NULL, NULL, NULL, 'salt lake,kolkata', 'west bengal', 'india', 746896, 'individual', '1', 'COD', '10', NULL, NULL, '2022-05-11 22:39:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `collection_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `product_name`, `product_quantity`, `product_price`, `created_at`, `updated_at`, `warehouse_id`, `collection_status`) VALUES
(1, '1', 'MHP00001', 'Chair', '5', '100', NULL, NULL, NULL, NULL),
(2, '1', 'MHP00002', 'Pen', '5', '10', NULL, NULL, NULL, NULL),
(3, '2', 'MHP00001', 'Chair', '5', '100', NULL, NULL, NULL, NULL),
(4, '3', 'MHP00002', 'Pen', '5', '10', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `order_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pending', 1, NULL, NULL),
(2, 'Completed', 1, NULL, NULL),
(3, 'Canceled', 1, NULL, NULL),
(4, 'Assign to Delivery', 1, NULL, NULL),
(5, 'Assign to Driver', 1, NULL, NULL),
(6, 'In transit', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `breakup_price_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dd_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dd_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checq_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checq_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `online_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `breakup_price_id`, `payment_type`, `amount`, `dd_no`, `dd_date`, `checq_no`, `checq_date`, `bank_name`, `online_date`, `transaction_no`, `created_at`, `updated_at`) VALUES
(1, '2', 'dd', '128', '23we21312', '2022-01-01', NULL, NULL, NULL, NULL, NULL, '2022-01-06 05:28:16', '2022-01-06 05:28:16'),
(10, '6', 'cash', '510.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-06 06:07:13', '2022-01-06 06:07:13'),
(12, '8', 'cash', '510.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-06 07:15:24', '2022-01-06 07:15:24'),
(13, '9', 'cash', '510.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-06 07:19:52', '2022-01-06 07:19:52');

-- --------------------------------------------------------

--
-- Table structure for table `payment_terms`
--

CREATE TABLE `payment_terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `terms_of_payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_terms`
--

INSERT INTO `payment_terms` (`id`, `terms_of_payment`, `created_at`, `updated_at`) VALUES
(1, 'Immidiate Payment', NULL, NULL),
(2, '15 Days', NULL, NULL),
(3, '21 Days', NULL, NULL),
(4, '30 Days', NULL, NULL),
(5, '45 Days', NULL, NULL),
(6, '2 Months', NULL, NULL),
(7, 'End of following month', NULL, NULL),
(8, '30% Now, Balance 60 Days', NULL, NULL),
(9, '30% Advance End of Following month', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pay_structures`
--

CREATE TABLE `pay_structures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` int(11) DEFAULT NULL,
  `commission` double(9,2) DEFAULT NULL,
  `cpf` double(9,2) DEFAULT NULL,
  `insurance` double(9,2) DEFAULT NULL,
  `medical_leave_entitlement` double(9,2) DEFAULT NULL,
  `medical_allowance` double(9,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pay_structures`
--

INSERT INTO `pay_structures` (`id`, `year`, `commission`, `cpf`, `insurance`, `medical_leave_entitlement`, `medical_allowance`, `created_at`, `updated_at`) VALUES
(1, 2022, 1.50, 1.50, 1.50, 1.50, 1.50, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'All', '1', NULL, NULL),
(2, 'Order Management', '1', NULL, NULL),
(3, 'Inventory Management', '1', NULL, NULL),
(4, 'Customer Management', '1', NULL, NULL),
(5, 'Warehouse Management', '1', NULL, NULL),
(6, 'Employee Management', '1', NULL, NULL),
(7, 'User Management', '1', NULL, NULL),
(8, 'Warehouse Product Stock', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_image` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mrp_price` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speed` int(11) DEFAULT NULL,
  `power_source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voltage` int(11) DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bar_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` decimal(3,2) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `material` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_cat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `length` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coverage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_pallet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_box` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pac_bags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loose_per_lorry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `battery_capacity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `battery_chemistry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_capacity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drilling_capacity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_load_speed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_gallery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `unique_id`, `product_name`, `available_quantity`, `price`, `description`, `created_at`, `updated_at`, `product_image`, `mrp_price`, `status`, `color`, `size`, `weight`, `speed`, `power_source`, `voltage`, `sku`, `supplier_code`, `bar_code`, `brand`, `tax`, `cat_id`, `material`, `height`, `width`, `sub_cat`, `length`, `coverage`, `per_pallet`, `per_box`, `pac_bags`, `loose_per_lorry`, `model`, `battery_capacity`, `battery_chemistry`, `max_capacity`, `drilling_capacity`, `no_load_speed`, `photo_gallery`) VALUES
(1, 'MHP00001', 'DFMALB 20V Max XX Oscillating Multi Tool Variable Speed Tool', '41', '100', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus dicta a earum aspernatur ea, possimus ad at officia quisquam quos, fugiat quasi nostrum ullam commodi quia, cum laborum dolor molestias fugiat quasi nostrum ullam', NULL, '2022-02-26 15:15:34', 'images/product-2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'MHP00002', 'Power Tools Set Chinese Manufacturer Production 50V Lithu Battery', '46', '200', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus dicta a earum aspernatur ea, possimus ad at officia quisquam quos, fugiat quasi nostrum ullam commodi quia, cum laborum dolor molestias fugiat quasi nostrum ullam', NULL, '2021-12-17 09:16:49', 'images/product-4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'MHP00003', 'Cordless Drill Professional Combo Drill And Screwdriver', '43', '5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus dicta a earum aspernatur ea, possimus ad at officia quisquam quos, fugiat quasi nostrum ullam commodi quia, cum laborum dolor molestias fugiat quasi nostrum ullam', NULL, '2021-10-07 23:55:05', 'images/product-10.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'MHP00004', 'DFMALB 20V Max XX Oscillating Multi Tool Variable Speed Tool', '44', '30', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus dicta a earum aspernatur ea, possimus ad at officia quisquam quos, fugiat quasi nostrum ullam commodi quia, cum laborum dolor molestias fugiat quasi nostrum ullam', NULL, '2021-10-07 07:09:03', 'images/product-2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'MHP00005', 'Power Tools Set Chinese Manufacturer Production 50V Lithu Battery', '50', '200', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus dicta a earum aspernatur ea, possimus ad at officia quisquam quos, fugiat quasi nostrum ullam commodi quia, cum laborum dolor molestias fugiat quasi nostrum ullam', NULL, NULL, 'images/product-4.jpg', 300, 1, '1,2', '1', '0', NULL, NULL, NULL, 'weg5654', NULL, NULL, 'test2', '0.00', 5, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'MHP00006', 'Cordless Drill Professional Combo Drill And Screwdriver', '25', '500', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus dicta a earum aspernatur ea, possimus ad at officia quisquam quos, fugiat quasi nostrum ullam commodi quia, cum laborum dolor molestias fugiat quasi nostrum ullam', NULL, NULL, 'images/product-10.jpg', 350, 1, '1.5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test tool4', '5.00', 6, NULL, NULL, NULL, '1', NULL, NULL, '5', '2', '2', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Power Tools', '2022-04-12 17:22:57', '2022-04-12 17:22:57', 1),
(2, 'Hand Tools', '2022-04-12 17:23:11', '2022-04-12 17:23:11', 1),
(3, 'Cordless Tools', '2022-04-12 17:23:38', '2022-04-12 17:23:38', 1),
(4, 'Welding & Soldering', '2022-04-12 17:23:52', '2022-04-12 17:23:52', 1),
(5, 'Gardening Tools', '2022-06-22 17:20:49', '2022-06-22 17:20:49', 1),
(6, 'Hand Tools', '2022-05-24 16:33:17', '2022-05-24 16:33:17', 1),
(7, 'Power Tools', '2022-05-24 16:33:22', '2022-05-24 16:33:22', 1),
(8, 'test tool', '2022-06-28 19:15:55', '2022-06-28 19:15:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst_treatment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quotation_template` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_terms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leads_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quotation_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `customer_id`, `gst_treatment`, `quotation_template`, `expiration`, `payment_terms`, `terms_condition`, `sales_id`, `leads_id`, `created_at`, `updated_at`, `quotation_unique_id`, `total_price`) VALUES
(40, '19', '1', NULL, NULL, NULL, NULL, 'S00040', '12', '2021-12-16 01:36:38', '2022-02-26 15:25:43', 'MHQ000001', NULL),
(41, '19', '1', NULL, NULL, NULL, NULL, NULL, '12', '2021-12-16 01:38:30', '2021-12-16 01:38:30', 'MHQ000002', NULL),
(42, '19', '1', NULL, '2021-12-26', NULL, NULL, 'S00042', '12', '2021-12-17 00:16:09', '2021-12-17 00:16:28', 'MHQ000003', NULL),
(43, '19', '1', NULL, '2021-12-16', NULL, NULL, NULL, '12', '2021-12-17 09:16:49', '2021-12-17 09:16:49', 'MHQ000004', '300.00'),
(44, '16', '2', NULL, '0009-09-08', NULL, NULL, NULL, '12', '2022-01-08 12:44:23', '2022-01-08 12:44:23', 'MHQ000005', NULL),
(45, '19', '1', NULL, '2022-03-05', NULL, NULL, 'S00045', '12', '2022-02-26 15:15:34', '2022-02-26 15:15:45', 'MHQ000006', '100.00');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_products`
--

CREATE TABLE `quotation_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quotation_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotation_products`
--

INSERT INTO `quotation_products` (`id`, `quotation_id`, `product_id`, `quantity`, `tax`, `total`, `created_at`, `updated_at`) VALUES
(30, '41', 'MHP00001', '1', '[]', '100.00', '2021-12-16 01:38:30', '2021-12-16 01:38:30'),
(31, '43', 'MHP00001', '1', '[]', NULL, '2021-12-17 09:16:49', '2021-12-17 09:16:49'),
(32, '43', 'MHP00002', '1', '[]', NULL, '2021-12-17 09:16:49', '2021-12-17 09:16:49'),
(33, '45', 'MHP00001', '1', '[]', NULL, '2022-02-26 15:15:34', '2022-02-26 15:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permissions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `permissions`) VALUES
(1, 'Admin', '1', NULL, NULL, NULL),
(2, 'User', '1', NULL, NULL, NULL),
(3, 'Employee', '1', NULL, NULL, NULL),
(4, 'Warehouse Manager', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_person`
--

CREATE TABLE `sales_person` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `person_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_person`
--

INSERT INTO `sales_person` (`id`, `person_name`, `created_at`, `updated_at`) VALUES
(1, 'person1', NULL, NULL),
(2, 'person2', NULL, NULL),
(3, 'person3', NULL, NULL),
(4, 'person4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_desc`, `created_at`, `updated_at`) VALUES
(1, 'Delivery Service', 'To deliver a product', '2021-12-24 04:19:12', '2021-12-24 04:19:12'),
(2, 'test service', 'for testing', '2021-12-24 05:25:47', '2021-12-24 05:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `height` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `height`, `width`, `unit`, `status`, `created_at`, `updated_at`) VALUES
(1, 1000, 1000, '1', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

CREATE TABLE `stage` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stage_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stage`
--

INSERT INTO `stage` (`id`, `stage_name`, `created_at`, `updated_at`) VALUES
(1, 'New', NULL, NULL),
(2, 'Qualified', NULL, NULL),
(3, 'Proposition', NULL, NULL),
(4, 'Won', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `states` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `states`, `created_at`, `updated_at`) VALUES
(106, '347', 'Andhra Pradesh', NULL, NULL),
(107, '347', 'Andaman and Nicobar Islands', NULL, NULL),
(108, '347', 'Arunachal Pradesh', NULL, NULL),
(109, '347', 'Assam', NULL, NULL),
(110, '347', 'Bihar', NULL, NULL),
(111, '347', 'Chandigarh', NULL, NULL),
(112, '347', 'Chhattisgarh', NULL, NULL),
(113, '347', 'Delhi', NULL, NULL),
(114, '347', 'Goa', NULL, NULL),
(115, '347', 'Gujarat', NULL, NULL),
(116, '347', 'Haryana', NULL, NULL),
(117, '347', 'Himachal Pradesh', NULL, NULL),
(118, '347', 'Jammu and Kashmir', NULL, NULL),
(119, '347', 'Jharkhand', NULL, NULL),
(120, '347', 'Karnataka', NULL, NULL),
(121, '347', 'Kerala', NULL, NULL),
(122, '347', 'Ladakh', NULL, NULL),
(123, '347', 'Lakshadweep', NULL, NULL),
(124, '347', 'Madhya Pradesh', NULL, NULL),
(125, '347', 'Maharashtra', NULL, NULL),
(126, '347', 'Manipur', NULL, NULL),
(127, '347', 'Meghalaya', NULL, NULL),
(128, '347', 'Mizoram', NULL, NULL),
(129, '347', 'Nagaland', NULL, NULL),
(130, '347', 'Odisha', NULL, NULL),
(131, '347', 'Punjab', NULL, NULL),
(132, '347', 'Puducherry', NULL, NULL),
(133, '347', 'Rajasthan', NULL, NULL),
(134, '347', 'Sikkim', NULL, NULL),
(135, '347', 'Tamil Nadu', NULL, NULL),
(136, '347', 'Telangana', NULL, NULL),
(137, '347', 'Tripura', NULL, NULL),
(138, '347', 'Uttar Pradesh', NULL, NULL),
(139, '347', 'Uttarakhand', NULL, NULL),
(140, '347', 'West Bengal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `sub_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `cat_id`, `sub_category`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 'test1 tool', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag_name`, `created_at`, `updated_at`) VALUES
(1, 'Tag1', NULL, NULL),
(2, 'Tag2', NULL, NULL),
(3, 'Tag3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taxs`
--

CREATE TABLE `taxs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tax_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxs`
--

INSERT INTO `taxs` (`id`, `tax_name`, `tax_value`, `created_at`, `updated_at`) VALUES
(1, 'GST 5%', '5', NULL, NULL),
(2, 'GST 4%', '4', NULL, NULL),
(3, 'GST 3%', '3', NULL, NULL),
(4, 'GST 2%', '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit`, `created_at`, `updated_at`) VALUES
(1, 'cm', NULL, NULL),
(2, 'm', NULL, NULL),
(3, 'gram', NULL, NULL),
(4, 'kg', NULL, NULL),
(5, 'pound', NULL, NULL),
(6, 'piece', NULL, NULL),
(7, 'dozen', NULL, NULL),
(8, 'tons', NULL, NULL),
(9, 'bags', NULL, NULL),
(10, 'mm', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uom`
--

CREATE TABLE `uom` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rounding_precision` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gst_uqc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uom_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ratio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uom`
--

INSERT INTO `uom` (`id`, `uom`, `active`, `category`, `rounding_precision`, `gst_uqc`, `uom_type`, `ratio`, `created_at`, `updated_at`) VALUES
(1, 'Days', '1', '3', '1', 'demo', 'Reference unit of measure for this category', NULL, '2021-10-22 06:57:26', '2021-10-22 06:57:26'),
(2, 'Dozens', '1', '1', '0.01000', '123', 'Bigger than the reference unit of measure', '2', '2021-10-22 07:07:09', '2021-10-22 07:07:09'),
(3, 'ft', '0', '4', '0.01000', '136', 'Bigger than the reference unit of measure', '1', '2021-10-22 07:09:38', '2021-10-22 07:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `uom_categories`
--

CREATE TABLE `uom_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uom_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uom_categories`
--

INSERT INTO `uom_categories` (`id`, `uom_category_name`, `created_at`, `updated_at`) VALUES
(1, 'Unit', NULL, NULL),
(2, 'Weight', NULL, NULL),
(3, 'Working Time', '2021-10-22 05:23:49', '2021-10-22 05:23:49'),
(4, 'Length/Distance', '2021-10-22 05:24:21', '2021-10-22 05:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `phone`, `image`, `email`, `password`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(73, 'MHU0000001', 'bullet', '', NULL, 'bull@gmail.com', '$2y$10$GQiiiWMNo3lXmJzfwkpq7edYsJRQQg0igXKKg0ayprfwi.kTqbD/2', NULL, NULL, '2022-07-06 07:59:49', '2022-07-06 07:59:49'),
(74, 'MHU0000001', 'madhu', '', NULL, 'test123@gmail.com', '$2y$10$VG5CsSYqckqGFusJsyjrW.owItg2HHDPjb0NorOoYCNBhU.Q6Tuw2', NULL, NULL, '2022-07-06 08:54:52', '2022-07-06 08:54:52'),
(75, 'MHU0000001', 'Nandhu', '', NULL, 'nandhu@gmail.com', '$2y$10$6giOjVo8XVNszZKYQIx.V.hh8vrFQl5Sx6vOpc6ZICtLCUK46lF4W', NULL, NULL, '2022-07-06 08:56:15', '2022-07-06 08:56:15'),
(76, 'MHU0000002', 'test', '', NULL, 'test@gmail.com', '$2y$10$3vwHEsb38Em0TUidYG21tuPLMsjAXyajFkA0IqwWaYn6AiNiGckWa', NULL, NULL, '2022-07-06 09:02:00', '2022-07-06 09:02:00'),
(77, 'MHU0000003', 'madhu1', '8899009900', NULL, 'madhu1@gmail.com', '$2y$10$0cXkuDb0at3OVrLilfbXruPo5RbMLkJpgyp9qvO.FVb8iLdaiPFRC', NULL, NULL, '2022-07-06 09:04:21', '2022-07-06 09:04:21'),
(78, 'MHU0000004', 'Thamil', '9672214067', NULL, 'thamil@gmail.com', '$2y$10$V6Kr7HO7rlOFDut.jSdrw.Gs3kLgqKLk.OwUT5B0WYm84hNZ1nRFC', NULL, NULL, '2022-07-07 02:20:17', '2022-07-07 02:20:17'),
(79, 'MHU0000005', 'tha', '9788671878', NULL, 'tha@gmail.com', '$2y$10$l2rOjEWoY5xf9fWWMdAkquDsQw7v3i8UjyFLDslFFXqWwzACVYlde', NULL, NULL, '2022-07-08 07:53:53', '2022-07-08 07:53:53'),
(80, 'MHU0000006', 'vicky', '9672214089', NULL, 'vicky@gmail.com', '$2y$10$Gz0xpYybbKA4.SCs5kzQuOsVlRANTGkJC06idgkGrGPpWagMP/KVy', NULL, NULL, '2022-07-08 08:04:30', '2022-07-08 08:04:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `address_1`, `address_2`, `address_3`, `zipcode`, `state`, `country`, `location`, `mobile`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '5/4B,Ganguly street', NULL, NULL, 700056, 'west bengal', 'india', NULL, -1130968750, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_plate_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chassis_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_colour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `capacity` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `trip_hour` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `trip_price` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `after_trip_price` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional_locn_price` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `after_6pm_price` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `after_10pm_price` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_day_price` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sunday_price` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `road_tax_expiry` date DEFAULT NULL,
  `inspection_due_date` date DEFAULT NULL,
  `parf_eligibility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parf_rebate_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coe_expiry_date` date DEFAULT NULL,
  `coe_rebate_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_rebate_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engine_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `vehicle_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_scheme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `half_day_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `model_name`, `license_plate_no`, `driver_id`, `chassis_no`, `model_colour`, `model_year`, `vehicle_image`, `status`, `capacity`, `trip_hour`, `trip_price`, `after_trip_price`, `additional_locn_price`, `after_6pm_price`, `after_10pm_price`, `full_day_price`, `sunday_price`, `created_at`, `updated_at`, `road_tax_expiry`, `inspection_due_date`, `parf_eligibility`, `parf_rebate_amount`, `coe_expiry_date`, `coe_rebate_amount`, `total_rebate_amount`, `engine_no`, `vehicle_type`, `brand_id`, `vehicle_no`, `vehicle_scheme`, `half_day_price`) VALUES
(3, '1', 'WB38S6534', 'MHE00005', '641633', 'Red', '2018', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-23 05:40:14', '2021-12-23 05:40:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '3', 'WB38M1347', 'MHE00004', '955364', 'Black', '2018', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-23 06:07:48', '2021-12-23 06:07:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2', 'WB38M5463', 'MHE00004', '953456', 'Blue', '2017', NULL, '1', '10 FT Lorry with tailgate', '2', '60', '30', '30', '45', '60', '240', '60', '2022-01-07 08:18:50', '2022-01-07 08:18:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '1', 'WB634512', 'MHE00004', '5646848689', 'Blue', '2022', NULL, '1', '10 Ton', '4', '200', '50', '52', '75', '100', '400', '100', '2022-02-15 16:23:38', '2022-02-15 16:23:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '1', 'WB123', 'MHE00007', '123456', 'green', '2022', NULL, '1', '10', '2', '500', '5', '500', '7.5', '10', '40', '10', '2022-05-09 15:00:23', '2022-05-09 15:00:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '4', '1', 'MHE00001', '123456', 'green', '2022', 'images/vehicles/Vehicle_1655359205.jpg', '1', '10', '2', '500', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-16 10:00:05', '2022-06-16 10:00:05', '2022-06-15', '2022-07-08', 'cfsdf', '24343', '2022-06-17', '35456', '3546', '4324', 'Crane', 5, '46654', 'sdad', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_brands`
--

CREATE TABLE `vehicle_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_brands`
--

INSERT INTO `vehicle_brands` (`id`, `brand_name`, `brand_image`, `created_at`, `updated_at`, `status`) VALUES
(5, 'Liebherr', NULL, '2022-06-16 09:55:35', '2022-06-16 09:55:35', 1),
(6, 'Maruti', NULL, '2022-06-16 09:57:48', '2022-06-16 09:57:48', 1),
(7, 'Cargotec', NULL, '2022-06-16 09:58:00', '2022-06-16 09:58:00', 1),
(8, 'Konecranes', NULL, '2022-06-16 09:58:12', '2022-06-16 09:58:12', 1),
(9, 'syska', NULL, '2022-06-28 19:48:12', '2022-06-28 19:48:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_models`
--

CREATE TABLE `vehicle_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fleet_manager` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_models`
--

INSERT INTO `vehicle_models` (`id`, `model_name`, `brand_id`, `vehicle_type`, `fleet_manager`, `created_at`, `updated_at`, `status`) VALUES
(4, 'MDL12', '5', 'Crane', NULL, '2022-06-16 09:58:33', '2022-06-16 09:58:33', 1),
(5, 'MDL13', '5', 'Crane', NULL, '2022-06-16 09:58:41', '2022-06-16 09:58:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_products`
--

CREATE TABLE `warehouse_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `selling_price` decimal(10,2) DEFAULT NULL,
  `min_stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avl_stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `ware_house_id` int(11) DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ware_houses`
--

CREATE TABLE `ware_houses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` bigint(20) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `address_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `war_house_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ware_houses`
--

INSERT INTO `ware_houses` (`id`, `name`, `email`, `mobile_no`, `phone`, `address_1`, `address_2`, `address_3`, `country_id`, `state`, `zipcode`, `password`, `war_house_img`, `status`, `created_at`, `updated_at`) VALUES
(1, 'iThink logistics.', 'ware@gmail.com', 915678909876, 916289621701, 'Home', '5/3A,Birchand Goswami Lane', NULL, 276, 'west bengal', 700005, '$2y$10$QgDkJz4SEzzCJfY1yyT52e6OY7g.bYdKwOce1PwFfO6ml6NchmYQe', NULL, 1, NULL, NULL),
(2, 'Aegis Logistics Ltd', 'aeg@gmail.com', 915678909876, 914567890989, 'Home', '5/3A,Birchand Goswami Lane', NULL, 276, 'west bengal', 700005, '$2y$10$gIC/mNyoEcKmYE/NFjl2MusvQRQHZIDpd5jv/SnMjNjetwO.z6W52', NULL, 1, NULL, NULL),
(3, 'Apollo LogiSolutions Ltd', 'apl@gmail.com', 919167890546, 915464356474, 'Home', '5/3A,Birchand Goswami Lane', NULL, 276, 'west bengal', 700005, '$2y$10$WOoOwtUos/1tMA8eMihC0.nOhLTnU9EpCZeIr8ScOaqYPp87g65Ui', NULL, 1, NULL, NULL),
(4, 'red warehouse', 'redwarehouse@gmail.com', 912156456546, 865546121325, 's', 's', 's', 214, 's', 55455456, '$2y$10$/bd.nD95l4TOOwLWwm5Umeqz4HtWi/0Ta3/KCdL32o2yhnpn.EGna', NULL, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chk_drivers`
--
ALTER TABLE `chk_drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `claim_models`
--
ALTER TABLE `claim_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_code`
--
ALTER TABLE `country_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `customer_contacts`
--
ALTER TABLE `customer_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_management`
--
ALTER TABLE `customer_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_method`
--
ALTER TABLE `delivery_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `work_email_unique` (`work_email`);

--
-- Indexes for table `employee_leave_models`
--
ALTER TABLE `employee_leave_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_logins`
--
ALTER TABLE `employee_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salaries`
--
ALTER TABLE `employee_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fleet_orders`
--
ALTER TABLE `fleet_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gst`
--
ALTER TABLE `gst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_price_breakups`
--
ALTER TABLE `invoice_price_breakups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_positions`
--
ALTER TABLE `job_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leavestructures`
--
ALTER TABLE `leavestructures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logistic_dashboards`
--
ALTER TABLE `logistic_dashboards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logistic_leads`
--
ALTER TABLE `logistic_leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logistic_leads_drivers`
--
ALTER TABLE `logistic_leads_drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logistic_leads_invoices`
--
ALTER TABLE `logistic_leads_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logistic_leads_products`
--
ALTER TABLE `logistic_leads_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logistic_leads_quotations`
--
ALTER TABLE `logistic_leads_quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logistic_leads_salespersons`
--
ALTER TABLE `logistic_leads_salespersons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logistic_stage`
--
ALTER TABLE `logistic_stage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_terms`
--
ALTER TABLE `payment_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_structures`
--
ALTER TABLE `pay_structures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_unique_id_unique` (`unique_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_products`
--
ALTER TABLE `quotation_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sales_person`
--
ALTER TABLE `sales_person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxs`
--
ALTER TABLE `taxs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uom`
--
ALTER TABLE `uom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uom_categories`
--
ALTER TABLE `uom_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_brands`
--
ALTER TABLE `vehicle_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_models`
--
ALTER TABLE `vehicle_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse_products`
--
ALTER TABLE `warehouse_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ware_houses`
--
ALTER TABLE `ware_houses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chk_drivers`
--
ALTER TABLE `chk_drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `claim_models`
--
ALTER TABLE `claim_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=793;

--
-- AUTO_INCREMENT for table `country_code`
--
ALTER TABLE `country_code`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customer_contacts`
--
ALTER TABLE `customer_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customer_management`
--
ALTER TABLE `customer_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_method`
--
ALTER TABLE `delivery_method`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee_leave_models`
--
ALTER TABLE `employee_leave_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_logins`
--
ALTER TABLE `employee_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee_salaries`
--
ALTER TABLE `employee_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fleet_orders`
--
ALTER TABLE `fleet_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gst`
--
ALTER TABLE `gst`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_price_breakups`
--
ALTER TABLE `invoice_price_breakups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `job_positions`
--
ALTER TABLE `job_positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `leavestructures`
--
ALTER TABLE `leavestructures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logistic_dashboards`
--
ALTER TABLE `logistic_dashboards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `logistic_leads`
--
ALTER TABLE `logistic_leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `logistic_leads_drivers`
--
ALTER TABLE `logistic_leads_drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `logistic_leads_invoices`
--
ALTER TABLE `logistic_leads_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `logistic_leads_products`
--
ALTER TABLE `logistic_leads_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `logistic_leads_quotations`
--
ALTER TABLE `logistic_leads_quotations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `logistic_leads_salespersons`
--
ALTER TABLE `logistic_leads_salespersons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logistic_stage`
--
ALTER TABLE `logistic_stage`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment_terms`
--
ALTER TABLE `payment_terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pay_structures`
--
ALTER TABLE `pay_structures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `quotation_products`
--
ALTER TABLE `quotation_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales_person`
--
ALTER TABLE `sales_person`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stage`
--
ALTER TABLE `stage`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `taxs`
--
ALTER TABLE `taxs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `uom`
--
ALTER TABLE `uom`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uom_categories`
--
ALTER TABLE `uom_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vehicle_brands`
--
ALTER TABLE `vehicle_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vehicle_models`
--
ALTER TABLE `vehicle_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `warehouse_products`
--
ALTER TABLE `warehouse_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ware_houses`
--
ALTER TABLE `ware_houses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
