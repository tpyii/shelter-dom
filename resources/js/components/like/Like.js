import {useState, useEffect} from 'react'
import heart from '../like/assets/like_favorite_heart_5759.png'
import likedHeart from '../like/assets/gui_like_placeholder_icon_157111.png'
import './heart.css'

export const Like = () => {
    const [like, setLike] = useState(false)

    const likeHandler = (e) => {
        setLike(() => !like)
    }
    const hearts = like ? likedHeart : heart
    return (
        <div style={{textAlign: 'end'}}>
            <img className='heart'
                 onClick={likeHandler}
                 style={{width: '28px', height: '28px', marginRight: '10px', marginTop: '10px', cursor: 'pointer'}}
                 src={hearts}
                 alt="unlike"
            />
        </div>

    )
}
