//
//  FamousPlaceDetail.swift
//  CheckInVN2
//
//  Created by PPPP on 09/02/2023.
//

import SwiftUI

struct FamousPlaceDetail: View {
    var famousPlace: Famous
    var body: some View {
        VStack{
            MapView(coordinate: famousPlace.locationCoordinate )
                .ignoresSafeArea(edges: .top)
                .frame(height: 250, alignment: /*@START_MENU_TOKEN@*/.center/*@END_MENU_TOKEN@*/)
            CircleImage(image: famousPlace.imageName)
                .offset(y: -130)
                .padding(.bottom, -130)
            VStack(alignment: .leading) {
                Text(famousPlace.name)
                    .font(/*@START_MENU_TOKEN@*/.title/*@END_MENU_TOKEN@*/)
                HStack {
                    Text("Thuộc quốc gia")
                    .font(.subheadline)
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

struct FamousPlaceDetail_Previews: PreviewProvider {
    static var previews: some View {
        FamousPlaceDetail(famousPlace:)
    }
}
