import {useState, useEffect, useMemo} from 'react'
import {NavBar} from '../NavBar/NavBar'

export const Profile = () => {
    const [data, setData] = useState({})
    const [emptyProfile, setEmptyProfile] = useState(() => {
        return {
            firstName: "",
            surname: "",
            address: "",
            birthday_at: "",
            phone: "",
            about: "",
        }
    })

    const changeInputRegister = event => {
        event.persist()
        setEmptyProfile(prev => {
            return {
                ...prev,
                [event.target.name]: event.target.value,
            }
        })
    }

    useMemo(() => {
        axios.get(`api/users/${localStorage.getItem('id')}`).then(res => {
            if (res !== '') {
                let dataI = res.data.data
                setData(() => dataI)
            }
        })
    }, [localStorage.getItem('id')])

    let image = data?.profile?.avatar

    return (
        <div
            style={{background: 'url(/images/noise_transparent@2x.png?e39085a…), radial-gradient(100% 215.42% at 0% 0%, #5B483A 0%, #262425 100%), #211F20'}}>
            <NavBar/>
            {data?.profile !== null && typeof data?.profile !== 'undefined'? (
                <div style={{
                    display: 'flex',
                    flexDirection: 'column',
                    textAlign: 'center',
                    alignItems: 'center'
                }}>
                    <h3 style={{color: 'white'}}>Hello {data?.name}</h3>
                    <img style={{
                        width: '200px',
                        height: '200px',
                        borderRadius: '50%',
                        marginBottom: '20px',
                        marginTop: '20px'
                    }}
                         src={`storage/${image}`}/>
                    <div style={{display: 'flex', flexDirection: 'column'}}>
                        <label style={{marginBottom: '5px', marginTop: '20px', color: 'white'}}
                               htmlFor="firstName">Name</label>
                        <input style={{width: '350px'}} name='firstName' value={data?.profile.name} type="text"/>
                    </div>
                    <div style={{display: 'flex', flexDirection: 'column'}}><label
                        style={{marginBottom: '5px', marginTop: '20px', color: 'white'}}
                        htmlFor="surname">Surname</label>
                        <input style={{width: '350px'}} name='surname' value={data?.profile.surname} type="text"/></div>

                    <div style={{display: 'flex', flexDirection: 'column'}}><label
                        style={{marginBottom: '5px', marginTop: '20px', color: 'white'}}
                        htmlFor="address">Address</label>
                        <input style={{width: '350px'}} name='address' value={data?.profile.address} type="text"/></div>

                    <div style={{display: 'flex', flexDirection: 'column'}}><label
                        style={{marginBottom: '5px', marginTop: '20px', color: 'white'}}
                        htmlFor="birthday_at">Birthday</label>
                        <input style={{width: '350px'}} name='birthday_at' value={data?.profile.birthday_at}
                               type="text"/>
                    </div>

                    <div style={{display: 'flex', flexDirection: 'column'}}><label
                        style={{marginBottom: '5px', marginTop: '20px', color: 'white'}}
                        htmlFor="phone">Phone</label>
                        <input style={{width: '350px'}} name='phone' value={data?.profile.phone} type="text"/></div>

                    <div style={{display: 'flex', flexDirection: 'column'}}><label
                        style={{marginBottom: '5px', marginTop: '20px', color: 'white'}}
                        htmlFor="about">About</label>
                        <textarea style={{width: '350px', marginBottom: '150px'}} value={data?.profile.description}
                                  name='about'/></div>

                </div>
            ) : (
                <div style={{
                    display: 'flex',
                    flexDirection: 'column',
                    textAlign: 'center',
                    alignItems: 'center'
                }}>
                    <h3 style={{color: 'white'}}>Hello {data?.name}</h3>
                    <img style={{
                        width: '200px',
                        height: '200px',
                        borderRadius: '50%',
                        marginBottom: '20px',
                        marginTop: '20px'
                    }}
                         src={`storage/image/Avatars/1/default-user.png`}/>
                    <div style={{display: 'flex', flexDirection: 'column'}}>
                        <label style={{marginBottom: '5px', marginTop: '20px', color: 'white'}}
                               htmlFor="firstName">Name</label>
                        <input onChange={changeInputRegister} style={{width: '350px'}} name='firstName' value={emptyProfile.firstName} type="text"/>
                    </div>
                    <div style={{display: 'flex', flexDirection: 'column'}}><label
                        style={{marginBottom: '5px', marginTop: '20px', color: 'white'}}
                        htmlFor="surname">Surname</label>
                        <input onChange={changeInputRegister} style={{width: '350px'}} name='surname' value={emptyProfile.surname} type="text"/></div>

                    <div style={{display: 'flex', flexDirection: 'column'}}><label
                        style={{marginBottom: '5px', marginTop: '20px', color: 'white'}}
                        htmlFor="address">Address</label>
                        <input onChange={changeInputRegister} style={{width: '350px'}} name='address' value={emptyProfile.address} type="text"/></div>

                    <div style={{display: 'flex', flexDirection: 'column'}}><label
                        style={{marginBottom: '5px', marginTop: '20px', color: 'white'}}
                        htmlFor="birthday_at">Birthday</label>
                        <input onChange={changeInputRegister} style={{width: '350px'}} name='birthday_at' value={emptyProfile.birthday_at} type="text"/>
                    </div>

                    <div style={{display: 'flex', flexDirection: 'column'}}><label
                        style={{marginBottom: '5px', marginTop: '20px', color: 'white'}}
                        htmlFor="phone">Phone</label>
                        <input onChange={changeInputRegister} style={{width: '350px'}} name='phone' value={emptyProfile.phone} type="text"/></div>

                    <div style={{display: 'flex', flexDirection: 'column'}}><label
                        style={{marginBottom: '5px', marginTop: '20px', color: 'white'}}
                        htmlFor="about">About</label>
                        <textarea onChange={changeInputRegister} style={{width: '350px', marginBottom: '150px'}} value={emptyProfile.about} name='about'/></div>

                </div>
            )}

        </div>
    )
}
