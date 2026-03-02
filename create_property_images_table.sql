-- Create property_images table to store additional property images
-- This table will store multiple images per property with foreign key relationship

CREATE TABLE `property_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Add index for faster queries
CREATE INDEX `idx_property_id` ON `property_images` (`property_id`);

-- Make existing images in properties table optional
ALTER TABLE `properties` MODIFY `house_img1` varchar(250) NULL;
ALTER TABLE `properties` MODIFY `house_img2` varchar(250) NULL;
ALTER TABLE `properties` MODIFY `house_img3` varchar(250) NULL;
ALTER TABLE `properties` MODIFY `house_img4` varchar(250) NULL;
