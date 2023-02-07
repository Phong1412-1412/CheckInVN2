//
//  ContentView.swift
//  CheckInVN2
//
//  Created by PPPP on 14/01/2023.
//

import SwiftUI

struct ContentView: View {
    
    var body: some View {
        VStack{
            MapView()
                .frame(height: 250, alignment: /*@START_MENU_TOKEN@*/.center/*@END_MENU_TOKEN@*/)
            CircleImage()
                .offset(y: -130)
                .padding(.bottom, -130)
            VStack(alignment: .leading) {
                Text("An Giang")
                    .font(/*@START_MENU_TOKEN@*/.title/*@END_MENU_TOKEN@*/)
                HStack {
                    Text("AN")
                    .font(.subheadline)
                     Spacer()
                    Text("Viet Nam")
                    .font(.subheadline)
                    
                }
                Divider()
                Text("Giới thiệu: An Giang")
                            .font(.title2)
                Text("Descriptive text goes here.")
            }
            .padding()
            Spacer()
        }
    }
}
struct ContentView_Previews: PreviewProvider {
    static var previews: some View {
        ContentView()
    }
}
