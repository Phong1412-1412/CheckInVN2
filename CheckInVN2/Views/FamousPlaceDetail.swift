//
//  FamousPlaceDetail.swift
//  CheckInVN2
//
//  Created by PPPP on 09/02/2023.
//

import SwiftUI
import MapKit

struct FamousPlaceDetail: View {
    var famousPlace: Famous
    var body: some View {
        ScrollView {
            VStack{
                MapView(coordinate: famousPlace.locationCoordinate )
                    .ignoresSafeArea(edges: .top)
                    .frame(height: 300)
                CircleImage(image: famousPlace.imageName)
                    .offset(y: -130)
                    .padding(.bottom, -130)
                VStack(alignment: .leading) {
                    Text(famousPlace.name)
                        .font(/*@START_MENU_TOKEN@*/.title/*@END_MENU_TOKEN@*/)
                    HStack {
                        Text("Địa chỉ: \(famousPlace.address)")
                        .font(.title2)
                         Spacer()
                        Text("Việt Nam")
                        .font(.subheadline)
                        
                    }
                    Divider()
                    Text("Giới thiệu: \(famousPlace.name)")
                                .font(.title2)
                    Text(famousPlace.description)
                }
                .padding()
                Spacer()
            }
        }
    }
}

struct FamousPlaceDetail_Previews: PreviewProvider {
    static var previews: some View {
        let coordinates = Famous.Coordinates(latitude: 37.7749, longitude: -122.4194)
        let famousplace = Famous(id: 1, id_provice: 2, name: "San Francisco", description: "City by the Bay", address: "test" ,image: "angiang", ischecked: 0, coordinates: coordinates)
        FamousPlaceDetail(famousPlace: famousplace)
    }
}
