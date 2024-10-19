-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 05:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `ict_appraisal_table`
--

CREATE TABLE `ict_appraisal_table` (
  `appraisal_id` varchar(20) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `developed_new_solution_target` varchar(90) DEFAULT NULL,
  `developed_new_solution_comment` text DEFAULT NULL,
  `network_downtime_closure_rate_target` varchar(90) DEFAULT NULL,
  `network_downtime_closure_rate_comment` text DEFAULT NULL,
  `increased_data_security_target` varchar(90) DEFAULT NULL,
  `increased_data_security_comment` text DEFAULT NULL,
  `tat_on_closure_of_staff_complaints_desk_support_target` varchar(90) DEFAULT NULL,
  `tat_on_closure_of_staff_complaints_desk_support_comment` text DEFAULT NULL,
  `it_cost_vs_revenue_generated_it_roi_target` varchar(90) DEFAULT NULL,
  `it_cost_vs_revenue_generated_it_roi_comment` text DEFAULT NULL,
  `fixed_deposit_volume_target` varchar(90) DEFAULT NULL,
  `fixed_deposit_volume_comment` text DEFAULT NULL,
  `developed_new_solution_target_supervisor_1` varchar(20) DEFAULT NULL,
  `developed_new_solution_comment_supervisor_1` text DEFAULT NULL,
  `network_downtime_closure_rate_target_supervisor_1` varchar(20) DEFAULT NULL,
  `network_downtime_closure_rate_comment_supervisor_1` text DEFAULT NULL,
  `increased_data_security_target_supervisor_1` varchar(20) DEFAULT NULL,
  `increased_data_security_comment_supervisor_1` text DEFAULT NULL,
  `closure_of_staff_complaints_desk_support_target_supervisor_1` varchar(20) DEFAULT NULL,
  `closure_of_staff_complaints_desk_support_comment_supervisor_1` text DEFAULT NULL,
  `it_cost_vs_revenue_generated_it_roi_target_supervisor_1` varchar(20) DEFAULT NULL,
  `it_cost_vs_revenue_generated_it_roi_comment_supervisor_1` text DEFAULT NULL,
  `fixed_deposit_volume_target_supervisor_1` varchar(20) DEFAULT NULL,
  `fixed_deposit_volume_comment_supervisor_1` text DEFAULT NULL,
  `efficiency_assessment_target_target_supervisor_1` varchar(20) DEFAULT NULL,
  `efficiency_assessment_comment_supervisor_1` text DEFAULT NULL,
  `behavioral_assessment_target_supervisor_1` varchar(20) DEFAULT NULL,
  `behavioral_assessment_comment_supervisor_1` text DEFAULT NULL,
  `customer_service_delivery_target_supervisor_1` varchar(20) DEFAULT NULL,
  `customer_service_delivery_comment_supervisor_1` text DEFAULT NULL,
  `personal_effectiveness_target_supervisor_1` varchar(20) DEFAULT NULL,
  `personal_effectiveness_comment_supervisor_1` text DEFAULT NULL,
  `supervisor_1_appraisal_remark` text DEFAULT NULL,
  `employee_demonstrates_willingness_job_target_supervisor_2` varchar(20) DEFAULT NULL,
  `employee_demonstrates_willingness_job_comment_supervisor_2` text DEFAULT NULL,
  `employee_responsibility_assigned_task_target_supervisor_2` varchar(20) DEFAULT NULL,
  `employee_responsibility_assigned_task_comment_supervisor_2` text DEFAULT NULL,
  `employee_contribution_company_expectation_target_supervisor_2` varchar(20) DEFAULT NULL,
  `employee_contribution_company_expectation_comment_supervisor_2` text DEFAULT NULL,
  `employee_demonstrates_team_work_spirit_target_supervisor_2` varchar(20) DEFAULT NULL,
  `employee_demonstrates_team_work_spirit_comment_supervisor_2` text DEFAULT NULL,
  `employee_an_asset_to_the_bank_target_supervisor_2` varchar(20) DEFAULT NULL,
  `employee_an_asset_to_the_bank_comment_supervisor_2` text DEFAULT NULL,
  `supervisor_2_appraisal_remark` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ict_appraisal_table`
--

INSERT INTO `ict_appraisal_table` (`appraisal_id`, `employee_id`, `developed_new_solution_target`, `developed_new_solution_comment`, `network_downtime_closure_rate_target`, `network_downtime_closure_rate_comment`, `increased_data_security_target`, `increased_data_security_comment`, `tat_on_closure_of_staff_complaints_desk_support_target`, `tat_on_closure_of_staff_complaints_desk_support_comment`, `it_cost_vs_revenue_generated_it_roi_target`, `it_cost_vs_revenue_generated_it_roi_comment`, `fixed_deposit_volume_target`, `fixed_deposit_volume_comment`, `developed_new_solution_target_supervisor_1`, `developed_new_solution_comment_supervisor_1`, `network_downtime_closure_rate_target_supervisor_1`, `network_downtime_closure_rate_comment_supervisor_1`, `increased_data_security_target_supervisor_1`, `increased_data_security_comment_supervisor_1`, `closure_of_staff_complaints_desk_support_target_supervisor_1`, `closure_of_staff_complaints_desk_support_comment_supervisor_1`, `it_cost_vs_revenue_generated_it_roi_target_supervisor_1`, `it_cost_vs_revenue_generated_it_roi_comment_supervisor_1`, `fixed_deposit_volume_target_supervisor_1`, `fixed_deposit_volume_comment_supervisor_1`, `efficiency_assessment_target_target_supervisor_1`, `efficiency_assessment_comment_supervisor_1`, `behavioral_assessment_target_supervisor_1`, `behavioral_assessment_comment_supervisor_1`, `customer_service_delivery_target_supervisor_1`, `customer_service_delivery_comment_supervisor_1`, `personal_effectiveness_target_supervisor_1`, `personal_effectiveness_comment_supervisor_1`, `supervisor_1_appraisal_remark`, `employee_demonstrates_willingness_job_target_supervisor_2`, `employee_demonstrates_willingness_job_comment_supervisor_2`, `employee_responsibility_assigned_task_target_supervisor_2`, `employee_responsibility_assigned_task_comment_supervisor_2`, `employee_contribution_company_expectation_target_supervisor_2`, `employee_contribution_company_expectation_comment_supervisor_2`, `employee_demonstrates_team_work_spirit_target_supervisor_2`, `employee_demonstrates_team_work_spirit_comment_supervisor_2`, `employee_an_asset_to_the_bank_target_supervisor_2`, `employee_an_asset_to_the_bank_comment_supervisor_2`, `supervisor_2_appraisal_remark`) VALUES
('0793682541', '15', '100', 'HR Appraisal System', '100', '10%', '100', 'Nill', '100', 'Nill', '100', 'Nill', '100', 'Nill', '5', 'yes', '5', 'yes', '5', 'yes', '5', 'yes', '5', 'test', '5', 'test', '5', 'test', '5', 'test', '5', 'test', '5', 'test', 'Done and Dusted.', 'Strongly Agree', 'test', 'Strongly Agree', 'test', 'Strongly Agree', 'test', 'Strongly Agree', 'test', 'Strongly Agree', 'test', 'Done and Dusted'),
('5721483960', '9', '10', 'i am learning new skills', '10', 'i am learning new skills', '10', 'i am learning new skills', '10', 'i am learning new skills', '10', 'i am learning new skills', '10', 'i am learning new skills', '2', 'i am learning new skills', '2', 'i am learning new skills', '3', 'i am learning new skills', '2', 'i am learning new skills', '1', 'i am learning new skills', '2', 'i am learning new skills', '2', 'i am learning new skills', '1', 'i am learning new skills', '2', 'i am learning new skills', '2', 'i am learning new skills', NULL, NULL, 'okay', 'Average', 'okay', 'Agreed', 'okay', 'Agreed', 'okay', 'Agreed', 'okay', NULL),
('7829650134', '8', '10', 'I WILL TRY MY BEST', '10', 'I WILL TRY MY BEST', '10', 'I WILL TRY MY BEST', '20', 'I WILL TRY MY BEST', '10', 'I WILL TRY MY BEST', '10', 'I WILL TRY MY BEST', '1', 'I WILL TRY MY BEST', '2', 'I WILL TRY MY BEST', '4', 'I WILL TRY MY BEST', '3', 'I WILL TRY MY BEST', '2', 'I WILL TRY MY BEST', '2', 'I WILL TRY MY BEST', '3', 'I WILL TRY MY BEST', '2', 'I WILL TRY MY BEST', '2', 'I WILL TRY MY BEST', '2', 'I WILL TRY MY BEST', 'I WILL TRY MY BEST', 'Agreed', 'I WILL TRY MY BEST', 'Disagrees', 'I WILL TRY MY BEST', 'Strongly Agree', 'I WILL TRY MY BEST', 'Average', 'I WILL TRY MY BEST', 'Strongly Agree', 'I WILL TRY MY BEST', 'I WILL TRY MY BEST');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ict_appraisal_table`
--
ALTER TABLE `ict_appraisal_table`
  ADD PRIMARY KEY (`appraisal_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
