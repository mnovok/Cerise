const heartIcons = document.querySelectorAll('.card .heart-icon');
for (let i = 0; i < heartIcons.length; i++) {
	const heartIcon = heartIcons[i];
	heartIcon.addEventListener('click', handleHeartIconClick);
}

const bookmarkIcons = document.querySelectorAll('.card .bookmark-icon');
for (let i = 0; i < bookmarkIcons.length; i++) {
	const bookmarkIcon = bookmarkIcons[i];
	bookmarkIcon.addEventListener('click', handleBookmarkIconClick);
}

function toggleHeart(e){
	if ( e.classList.contains("fa-heart") ) {
        e.classList.remove("fa-heart");
        e.classList.add("fa-heart-o");

    }
    else {
        e.classList.remove("fa-heart-o");
        e.classList.add("fa-heart");
    }
	
}

function toggleBookmark(e){

	if (e.classList.contains("fa-bookmark") ) {
        e.classList.remove("fa-bookmark");
        e.classList.add("fa-bookmark-o");
    }
    else {
        e.classList.remove("fa-bookmark-o");
        e.classList.add("fa-bookmark");
    }
}

heart-icon.addEventListener("click", toggleHeart);

async function handleHeartIconClick(e) {
	
	const heartIcon = e.currentTarget;
	const heartContainer = heartIcon.parentElement;

	const card = heartIcon.closest('.card');
	const cardId = card.getAttribute('data-card-id');
	const likeElement = heartContainer.querySelector('.number-of-likes');
	const likes = likeElement.textContent;

	const isCurrentlyLiked = heartIcon.classList.contains('fa-heart');

    if(!isCurrentlyLiked) {
        likes = parseInt(likes, 10)+1;
    } else {
        likes = parseInt(likes, 10)-1;
    }

try {
	const serverResponse = await fetch(
		`API.php?action=toggleCardLike&id=${cardId}&liked=${isCurrentlyLiked ? 0 : 1}&likes=${likes}`
	);
	const responseData = await serverResponse.json();

	if (!responseData.success) {
		throw new Error(`Error liking card: ${responseData.reason}`);
	}

	if (!isCurrentlyLiked) {
		// if heart is 'empty'
		heartIcon.classList.remove('fa-heart-o');
		heartIcon.classList.add('fa-heart');
		likeElement.innerHTML = likes;
	} else {
		heartIcon.classList.remove('fa-heart');
		heartIcon.classList.add('fa-heart-o');
		likeElement.innerHTML = likes;
	}
} catch (error) {
	throw new Error(error.message || error);
}
}


async function handleBookmarkIconClick(e) {
	
	const bookmarkIcon = e.currentTarget;
	const bookmarkContainer = bookmarkIcon.parentElement;

	const card = bookmarkIcon.closest('.card');
	const cardId = card.getAttribute('data-card-id');
	const bookmarkElement = bookmarkContainer.querySelector('.bookmarks');
	const bookmarks = bookmarkElement.textContent;

	const isCurrentlyBookmarked = bookmarkIcon.classList.contains('fa-bookmark');

    if(!isCurrentlyBookmarked) {
        bookmarks = parseInt(bookmarks, 10)+1;
    } else {
        bookmarks = parseInt(bookmarks, 10)-1;
    }
	
	try{
		const serverResponse = await fetch(
			`API.php?action=toggleCardBookmark&id=${cardId}&bookmarked=${isCurrentlyBookmarked ? 0 : 1}&bookmarks=${bookmarks}`
		);
		const responseData = await serverResponse.json();

		if (!responseData.success) {
			throw new Error(`Error toggle bookmark: ${responseData.reason}`);
		}

		if (!isCurrentlyBookmarked) {
			heartIcon.classList.remove('fa-bookmark-o');
			heartIcon.classList.add('fa-bookmark');
			bookmarkElement.innerHTML = bookmarks;
		} else {
			heartIcon.classList.remove('fa-bookmark');
			heartIcon.classList.add('fa-bookmark-o');
			bookmarkElement.innerHTML = bookmarks;
		}

	}
	catch(error){
		throw new Error(error.message || error);
	}
	
}
