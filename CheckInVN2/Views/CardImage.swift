//
//  CardImage.swift
//  CheckInVN2
//
//  Created by PPPP on 13/02/2023.
//

import SwiftUI

struct CardImage: View {
    var famousPlace: Famous
      var body: some View {
          ZStack(alignment: .topTrailing) {
              ZStack(alignment: .bottom) {
                famousPlace.imageName
                      .resizable()
                      .cornerRadius(20)
                      .frame(width: 180)
                      .scaledToFit()
                  
                  VStack(alignment: .leading) {
                    Text(famousPlace.name)
                          .bold()
                      
                      Text("Việt Nam")
                          .font(.caption)
                  }
                  .padding()
                  .frame(width: 180, alignment: .leading)
                  .background(Color.white.opacity(0.5))
                  .cornerRadius(20)
              }
              .frame(width: 180, height: 250)
              .shadow(radius: 3)
          }
      }
}

struct CardImage_Previews: PreviewProvider {
    static var previews: some View {
        CardImage(famousPlace: famousplace)
    }
}
