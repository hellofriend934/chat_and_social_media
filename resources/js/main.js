
class WebSocketApi{
    constructor() {
        this.events = {

        }
    }

    send(data){
        const {event, payload} = data
        this.events[event].forEach(cb=>cb(payload))
    }
    on(event, cb){
        if (!this.events[event])this.events[event] =[]

        this.events[event].push(cb)
    }


}



let api =  new WebSocketApi
let localVideo = document.getElementById('localVideo')
let remoteVideo = document.getElementById('remoteVideo')
let servers =null
let localPerConnection = null
let remotePerConnection = null


navigator.mediaDevices.getUserMedia({video: true}).then((stream)=>{
    localVideo.srcObject = stream

    const videoTrack = stream.getVideoTracks()[0]

    localPerConnection = new RTCPeerConnection(servers)
    localPerConnection.addEventListener('icecandidate', (event)=>{
        if (event.candidate){
            api.send({event: 'LOCAL_CANDIDATE', payload: event.candidate})
        }
    })

    api.on("REMOTE_CANDIDATE", (candidate)=>{
        localPerConnection.addIceCandidate(new RTCIceCandidate(candidate))
    })

    api.on('REMOTE_DESCRIPTION',(description)=>{
        localPerConnection.setRemoteDescription(description)
    })

    localPerConnection.addTrack(videoTrack,stream)

    localPerConnection.createOffer().then((description)=>{
        api.send({event:'LOCAL_DESCRIPTION', payload: description})
    })

})

remotePerConnection = new RTCPeerConnection(servers)
api.on('LOCAL_DESCRIPTION', (description)=>{
    remotePerConnection.setRemoteDescription(description)
    remotePerConnection.addEventListener('icecandidate', (event)=>{
        if (event.candidate){
            api.send({event:'REMOTE_CANDIDATE', payload: event.candidate})
        }
    })
    remotePerConnection.addEventListener('track', (event)=>{
        remoteVideo.srcObject = event.steam
    })

    api.on("LOCAL_CANDIDATE", (candidate)=>{
        remotePerConnection.addIceCandidate(new RTCIceCandidate(candidate))
    })

    remotePerConnection.createAnswer().then((description)=>{
        remotePerConnection.setLocalDescription(description)
        api.send({event:'LOCAL_DESCRIPTION', payload: description})
    })
})
