import {useState, useEffect} from 'react'
import heart from '../like/assets/like_favorite_heart_5759.png'
import likedHeart from '../like/assets/gui_like_placeholder_icon_157111.png'
import {deleteFavourit, addFavourit} from '../store/getAnimalsList/actions'
import {useDispatch, useSelector} from 'react-redux'
import './heart.css'

export const Like = ({isLiked, getLikedAnimalDataById}) => {
    const [like, setLike] = useState(isLiked)

    useEffect(() => {
        setLike(isLiked)
    }, [isLiked])

    const hearts = like ? likedHeart : heart

    return (
        <div style={{textAlign: 'end'}}>
            <img className='heart'
                 onClick={getLikedAnimalDataById}
                 style={{width: '28px', height: '28px', marginRight: '10px', marginTop: '10px', cursor: 'pointer'}}
                 src={hearts}
                 alt="unlike"
            />
        </div>

    )
}
