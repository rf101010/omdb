-- Jed
-- Query 1) Get all the movies and their trivia (so that we can show this information in a table). Return NULL if the trivia doesn’t exist for a movie. This ensures that we show movies in UI with blanks for the trivia.

SELECT movies.movie_id, 
       native_name, 
       movie_trivia_id, 
       movie_trivia_name 
FROM   movies 
       LEFT OUTER JOIN movie_trivia 
                    ON movies.movie_id = movie_trivia.movie_id 



--  Jonathan, 
-- Query 2) Get all the movies and the quotes in those movies (so that we can show this information in a table)

SELECT movies.movie_id, 
       native_name, 
       movie_quote_id, 
       movie_quote_name 
FROM   movies 
       LEFT OUTER JOIN movie_quotes 
                    ON movies.movie_id = movie_quotes.movie_id



--  Mel, 
-- Query 3) Get all the movies and the corresponding media.


SELECT movies.movie_id, 
       native_name, 
       movie_media_id, 
       m_link,
       m_link_type
FROM   movies 
       LEFT OUTER JOIN movie_media 
                    ON movies.movie_id = movie_media.movie_id  
ORDER BY `movies`.`movie_id` ASC



--  Reynold,
--  Query 4) Get all the movies and the corresponding people info

SELECT movies.movie_id,
       native_name,
       movie_people.people_id, 
       stage_name, 
       role,
       first_name,
       last_name,
       screen_name
FROM   movies 
       LEFT OUTER JOIN movie_people 
                    ON movies.movie_id = movie_people.movie_id 
       LEFT OUTER JOIN people
       				ON people.people_id = movie_people.people_id


--  Ryan,  
-- Query 5) Get the list of all people in the database
SELECT * FROM people



--  Samantha, 
-- Query 6) Get the list of all people in the database. And also show their association with the movies along with the “role” and “screen_name”. 

SELECT movies.movie_id, 
	   native_name,
       movie_people.people_id, 
       stage_name, 
       role,
       first_name,
       middle_name,
       last_name,
       gender,
       image_name,
       screen_name
FROM   movies 
       LEFT OUTER JOIN movie_people 
                    ON movies.movie_id = movie_people.movie_id 
       LEFT OUTER JOIN people
       				ON people.people_id = movie_people.people_id



-- (All), Query 33)
-- Connect all the tables from “movies” perspective; You should show ALL movies. Show NULLs if there is no corresponding movie_data or media or songs or people

SELECT movies.movie_id, 
       native_name, 
       english_name, 
       year_made, 
       tag_line, 
       language, 
       country, 
       genre, 
       plot, 
       (SELECT COUNT(movie_trivia_id) 
        FROM movie_trivia 
        WHERE movies.movie_id = movie_trivia.movie_id) AS movie_trivia_count, 
       (SELECT COUNT(keyword)
        FROM movie_keywords
        WHERE movies.movie_id = movie_keywords.movie_id) AS movie_keyword_count,
        (SELECT COUNT(movie_media_id)
         FROM movie_media
         WHERE movies.movie_id = movie_media.movie_id) AS movie_media_count,
        (SELECT COUNT(song_id)
         FROM movie_song
         WHERE movies.movie_id = movie_song.movie_id) AS movies_song_count,
        (SELECT COUNT(people_id)
         FROM movie_people
         WHERE movies.movie_id = movie_people.movie_id) movie_people_count
        
FROM   movies 
       LEFT OUTER JOIN movie_data 
                    ON movies.movie_id = movie_data.movie_id
                    
--Comment Added by Reynold
--Comment Added by Jonathan
--Super Secret Comment by Reynold
-- Super Super Comment by Jed